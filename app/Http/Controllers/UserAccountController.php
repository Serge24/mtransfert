<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Models\ChangeRate;
use App\Http\Models\JsonApi;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserContact;
use App\Utils\cuid;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class UserAccountController extends Controller
{
    public function getTransactions(Request $request)
    {
        $user = User::with("remittances", "cashInValidated")->where("id", $request->input("user_id", -1))->first();

        if (!$user) {
            return JsonApi::error("Resource not found");
        }

        $cashIn = $user->cashInValidated;
        $remittances = $user->remittances;
        $data = collect()->concat([$cashIn, $remittances])->flatten()->sort(function (Transaction $old_t, Transaction $new_t) {
            return $new_t->id - $old_t->id;
        });

        $transactions = collect([]);

        foreach ($data as $transaction) {
            $transactions->push($transaction);
        }

        return JsonApi::success($transactions->count() . " transaction(s) successfully fetched", $transactions);
    }

    public function getTransactionDetails(Request $request, int $transaction_id)
    {
        $transaction = Transaction::with("payee", "payer")->where("id", $transaction_id)->first();

        if (!$transaction) {
            return JsonApi::error("Error occurred while trying to fetch resource");
        }
        return JsonApi::success("Transaction successfully fetched", $transaction);
    }

    public function getContacts(Request $request)
    {
        $user = User::with("contacts", "cashIn")->where("id", $request->input("user_id", -1))->first();

        if (!$user) {
            return JsonApi::error("Resource not found " . $request->input("user_id", -1));
        }

        $contacts = $user->contacts;
        return JsonApi::success("OK", $contacts);
    }

    public function addContact(Request $request)
    {
        $customerName = $request->input("customer_name", -1);
        $customerNumber = $request->input("customer_number", -1);

        $user = User::find($request->input("user_id", -1));

        if (!$user) {
            return JsonApi::error("Resource not found");
        }

        //Check if user exists
        $checkUser = User::where("no_account", $customerNumber)->first();

        if ($checkUser && $checkUser->id === $user->id) {
            return JsonApi::error("Unauthorized operation");
        }

        if ($checkUser) {
            //Le compte n'était pas t'il déjà lié à l'utilisateur?
            $contact = UserContact::with('contact')->where("user_id", $user->id)->where("contact_id", $checkUser->id)->first();

            if ($contact) {
                return JsonApi::error("Contact already synced. Check the name '" . $contact->contact->name . "' in your contacts");
            }
            $user->contacts()->attach([$checkUser->id]);
            return JsonApi::success("Contact synced with an existing phone number", $checkUser);
        }

        $newUser = $user->contacts()->create([
            "name" => $customerName,
            "is_temp_user" => 1,
            "no_account" => $customerNumber,
            "login" => $customerNumber,
            "password" => bcrypt("1234")
        ]);

        return JsonApi::success("Contact successfully saved", User::find($newUser->id));
    }

    public function addTransferRequest(Request $request)
    {
        // return JsonApi::error(json_encode([$request->all(), $request->hasFile("proof_picture")]));
        $proofPicture = $request->hasFile("proof_picture");
        if (!$proofPicture) {
            return JsonApi::error("Make sure to attach proof picture");
        }
        // dd($request->file("proof_picture"));

        $proofPicture = $request->file("proof_picture");

        $amountToTransfer = $request->input("amount", -1);
        $fromCurrency = $request->input("from_currency", "xof");
        $toCurrency = $request->input("to_currency", "ghs");
        $payeeId = $request->input("payee_id", -1);
        $payerId = $request->input("user_id", -1);
        $forTogo = $request->input("for_togo", 0);

        $payee = User::find($payeeId);
        $payer = User::find($payerId);

        if (!$payee || !$payer) {
            return JsonApi::error("Payee or Payer not found");
        }

        $formData = [
            "ref" => cuid::make(),
            "amount" => $amountToTransfer,
            "currency" => [
                "from" => $fromCurrency,
                "to" => $toCurrency,
                "for_togo" => $forTogo,
            ],
            "payee_id" => $payeeId,
            "destination_number" => $request->input("destination_number"),
            "payer_id" => $payerId,
            "computed_rate" => (ApiController::convertDataToObject(true))
        ];

        $transaction = Transaction::create($formData);

        if (!$transaction) {
            return JsonApi::error("Error occured wile pushing transaction");
        }

        if ($proofPicture instanceof UploadedFile) {
            if ($proofPicture->isValid()) {
                $name = cuid::make() . "." . $proofPicture->getClientOriginalExtension();

                $image_path = (env('APP_DEBUG', false) == true) ? public_path("images/transactions") : ("images/transactions");

                $proofPicture->move($image_path, $name);

                $transaction->proof_picture = "transactions/$name";
            }
        }
        $transaction->ref = $transaction->ref . "/" . $transaction->id;
        $transaction->save();

        return JsonApi::success("Transaction successfully saved", $transaction);
    }

    public function getPriceList(Request $request)
    {
        $priceList = ChangeRate::orderBy("id", 'asc')->get();

        return JsonApi::success(count($priceList) . " fetched item(s) successfully", $priceList);
    }

    public function appSettings(Request $request)
    {
        return JsonApi::success("Ok", (ApiController::convertDataToObject(true)));
    }
}
