<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\AppSetting;
use App\Http\Models\ChangeRate;
use App\Http\Models\JsonApi;
use App\Http\Models\SalePoint;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use PhpParser\Node\Expr\Cast\Object_;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        // Lookup user manually
        $user = User::with('country')->where('login', $login)->first();

        if (!$user) {
            return JsonApi::error("Invalid credentials");
        }

        // Verify password
        if (!($hashed = Hash::check($password, $user->password))) {
            return JsonApi::error('Login ou mot de passe incorrecte');
        }
        // Verify status
        if ($user->status !== 'ACTIVE') {
            return JsonApi::error('Opération non autorisée. Votre compte est inactif');
        }

        auth()->loginUsingId($user->id, true);

        return JsonApi::success("Connection sucessful", $user);
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $no_account = $request->input('no_account');
        $gender = $request->input('gender');
        $login = $request->input('login');
        $password = bcrypt($request->input('password'));
        $transfer_point_code = $request->input('transfer_point_code');

        // Lookup user manually
        $user = User::with('country')->where('login', $login)->first();

        if ($user) {
            return JsonApi::error('This login is already taken. Please choose another one');
        }

        $transfer_point = SalePoint::whereCode($transfer_point_code)->first();

        if (!$transfer_point) {
            return JsonApi::error('Transfer point not found');
        }

        $sale_point_id = $transfer_point->id;

        $user = User::where(["no_account" => $no_account])->first();

        if ($user) {
            if ($user->is_temp_user == 1) {
                $is_temp_user = "0";
                User::whereId($user->id)->update(compact("name", "sale_point_id", "no_account", "gender", "login", "password", "is_temp_user"));
            } else {
                return JsonApi::error("This account already exists. Please login or recover your password");
            }
            //modification du compte de l'intéressé
        } else {
            $user = User::create(compact("name", "sale_point_id", "no_account", "gender", "login", "password"));
        }

        auth()->loginUsingId($user->id, true);

        return JsonApi::success("Account sucessfully created", User::find($user->id));
    }

    public function getChangeRate(Request $request): JsonResponse
    {
        $amount = $request->input("amount");

        $rate = self::getChangeRateValue($amount);

        if (!$rate) {
            return JsonApi::error("Amount out of bound");
        }

        return JsonApi::success("", $rate);
    }

    public static function currencyConvert(Request $request): JsonResponse
    {
        $amount = $request->input("amount");
        $convertFrom = strtolower($request->input("convert_from", "xof"));
        $convertTo = strtolower($request->input("convert_to", "ghs"));

        if (!in_array($convertTo, ["ghs", "xof"])) {
            return JsonApi::error("Initial currency not recognized");
        }

        if (!in_array($convertTo, ["ghs", "xof"])) {
            return JsonApi::error("Final currency not recognized");
        }

        $result = to_fixed(self::currencyConverter($amount, $convertFrom, $convertTo));

        return JsonApi::success("", $result);
    }

    public static function currencyConverter(float $amount, string $convertFrom, string $convertTo): float
    {
        $appSettings = self::convertDataToObject(false);
        //ghs vers ghs c'est le même montant. pas de calcul

        $convertFrom = strtolower(trim($convertFrom));
        $convertTo = strtolower(trim($convertTo));

        //{"ghs_to_xof": 76.92, "xof_to_ghs": 0.0132}
        if ($convertFrom === $convertTo) {
            return $amount;
        } else {
            if ($convertFrom === "ghs") {
                return $amount * $appSettings->conversions["ghs_to_xof"];
            } else {
                return $amount * $appSettings->conversions["xof_to_ghs"];
            }
        }
    }

    public function estimateAmount(Request $request)//: JsonResponse|ChangeRate
    {
        $amount = $request->input("amount");
        $transferFrom = trim(strtolower($request->input("transfer_from")));
        $transferTo = trim(strtolower($request->input("transfer_to")));

        if (!in_array($transferFrom, ["ghs", "xof"])) {
            return JsonApi::error("Initial currency not recognized");
        }

        if (!in_array($transferTo, ["ghs", "xof"])) {
            return JsonApi::error("Final currency not recognized");
        }

        if ($transferTo == "xof" && $request->input("for_tg", 0) == 1) {
            $is_for_tg = true;
        } else {
            $is_for_tg = false;
        }
        //return self::getChangeRateValue($amount, $is_for_tg);

        $value = self::currencyConverter($amount, $transferFrom, $transferTo);

        if ($transferFrom == $transferTo) {
            $value = $amount;
            if ($transferFrom == "xof") {
                $fees = self::getChangeRateValue($amount, $is_for_tg)->change;
            } else {
                $ghs_to_xof = self::currencyConverter($amount, "ghs", "xof");
                $fees_from_xof = self::getChangeRateValue($ghs_to_xof, $is_for_tg);
                $fees = self::currencyConverter($fees_from_xof->change, "xof", "ghs");
            }
        } else {
            if ($transferFrom === "xof") {
                $value = self::currencyConverter($amount, "xof", "ghs");
                $fees_from_xof = self::getChangeRateValue($amount, $is_for_tg);
                $fees = self::currencyConverter($fees_from_xof->change, "xof", "ghs");
            } else {
                $ghs_to_xof = self::currencyConverter($amount, "ghs", "xof");
//                dd($ghs_to_xof);
                $fees = self::getChangeRateValue($ghs_to_xof, $is_for_tg)->change;
            }
        }

        $result = [
            "value" => number_format(round($value, 0), 3, ".", ""),
            "fees" => $fees,
            "currency" => $transferTo
        ];

        return JsonApi::success("", $result);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAmountToReceive(Request $request)
    {
        $amount = $request->input("amount");
        $from = strtolower($request->input("transfer_from"));
        $to = strtolower($request->input("transfer_to"));
        $for_togo = ($request->has("for_togo") && $request->input("for_togo", 0) == 1);


        if (!in_array($from, ["ghs", "xof"])) {
            return JsonApi::error("Initial currency not recognized");
        }

        if (!in_array($to, ["ghs", "xof"])) {
            return JsonApi::error("Final currency not recognized");
        }

        if ($from === "ghs" && $from != $to) {
            $amount = self::currencyConverter($amount, "ghs", "xof");
            $fees = self::getChangeRateValue($amount, $for_togo)->change;
        } else if ($from === "xof" && $from != $to) {
            $amount = self::currencyConverter($amount, "xof", "ghs");
            $fees_in_xof = self::getChangeRateValue($amount, $for_togo)->change;

            //Les frais doivent être convertie
            $fees = self::currencyConverter($fees_in_xof, "xof", "ghs");
        } else {
            $fees = self::getChangeRateValue($amount, $for_togo)->change;
        }
        $amount_to_receive = $amount - $fees;

        return JsonApi::success("", [
            "amount" => round($amount, 2),
            "fees" => round($fees, 2),
            "amount_to_receive" => round($amount_to_receive, 2),
            "currency" => $to,
        ]);
    }

    public function loadPointOfTransfer(Request $request)
    {
        $pointOfTransfer = SalePoint::query()->with("country")->whereState("LOCAL")->get();
        return JsonApi::success("", $pointOfTransfer);
    }

    public function loadAppSettings()
    {
        $appSetting = AppSetting::first();

        if ($appSetting) {
            return JsonApi::success("", $appSetting);
        } else {
            return JsonApi::error("Nothing to show");
        }
    }
}
