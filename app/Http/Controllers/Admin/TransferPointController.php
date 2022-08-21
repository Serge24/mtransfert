<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Country;
use App\Http\Models\SalePoint;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Utils\cuid;
use Illuminate\Http\Request;

class TransferPointController extends Controller
{
    public function index(Request $request)
    {
        $ownedSalePoints = SalePoint::whereState("LOCAL")->get();
        $otherSalePoints = SalePoint::whereState("DETACHED")->get();

        return view('backend/pages/sale_points/index', compact("ownedSalePoints", "otherSalePoints"));
    }

    public function create(Request $request)
    {
        $countries = Country::all();
        $users = User::whereIsTempUser(0)->whereIn("role_level", [1, 2, 3])->get();
        $data = compact("countries", "users");
        return view('backend/pages/sale_points/create', $data);
    }

    public function store(Request $request)
    {
        $country = Country::whereId($request->input('country_id', -1))->first();
        $manager = User::whereIsTempUser(0)->whereIn("role_level", [1, 2, 3])->whereId($request->input('manager', -1))->first();

        if (!$country) {
            session()->flash('error', "Référence de pays non trouvée");
            return redirect()->route('admin_transfer_points.index');
        }

        if (!$manager) {
            session()->flash('error', "Référence de l'utilisateur non trouvée");
            return redirect()->route('admin_transfer_points.index');
        }

        $data = [
            "name" => $request->input("name"),
            "manager" => $manager->id,
            "state" => $request->has("state") ? $request->input("state") : "LOCAL",
            "contact" => $request->input("contact"),
            "code" => cuid::make()."/".date("Y"),
            "country_id" => $country->id,
        ];

        $transfer_point = SalePoint::create($data);

        if ($transfer_point) {
            session()->flash('message', 'Point de transfert enrégistré avec succès');
            return redirect()->route('admin_transfer_points.index');
        }

        session()->flash('error', "Erreur lors de l'enregistrement");
        return redirect()->back();
    }

    public function show(Request $request, $transfer_point_id)
    {
        /**
         *
        $countries = Country::all();
        $users = User::whereIsTempUser(0)->whereIn("role_level", [1, 2, 3])->get();
        $data = compact("countries", "users");
        return view('backend/pages/sale_points/create', $data);
         */
        $transfer_points = SalePoint::get();
        $transfer_point = SalePoint::query()
            ->with('transactions', 'users')
            ->with(['users'=>function ($user){
                $user->whereRoleLevel("0");
            }])
            ->where('id', $transfer_point_id)
            ->first();

        if (!$transfer_point) {
            session()->flash('error', "Référence du point de vente non trouvé");
            return redirect()->route('admin_transfer_points.index');
        }

        return view('backend/pages/sale_points/show', compact("transfer_point", "transfer_points"));
    }

    public function edit(Request $request, int $transfer_point_id)
    {
        $countries = Country::all();
        $users = User::whereIsTempUser(0)->whereIn("role_level", [1, 2, 3])->get();

        $transfer_point = SalePoint::find($transfer_point_id);

        if(!$transfer_point){
            session()->flash('error', "Référence non trouvée");
            return redirect()->route('admin_transfer_points.index');
        }

        $data = compact("countries", "users", "transfer_point");

        //dd($transfer_point);
        return view('backend/pages/sale_points/edit', $data);
    }

    public function update(Request $request, int $transfer_point_id)
    {
        $country = Country::whereId($request->input('country_id', -1))->first();
        $manager = User::whereIsTempUser(0)->whereIn("role_level", [1, 2, 3])->whereId($request->input('manager', -1))->first();
        $transfer_point = SalePoint::find($transfer_point_id);

        if (!$country) {
            session()->flash('error', "Référence de pays non trouvée");
            return back();
        }

        if (!$manager) {
            session()->flash('error', "Référence de l'utilisateur non trouvée");
            return back();
        }

        if (!$transfer_point) {
            session()->flash('error', "Référence du point non trouvée");
            return back();
        }

        $data = [
            "name" => $request->input("name"),
            "manager" => $manager->id,
            "state" => $request->has("state") ? $request->input("state") : "LOCAL",
            "contact" => $request->input("contact"),
            "code" => cuid::make(),
            "country_id" => $country->id,
        ];

        $transfer_point = $transfer_point->update($data);

        if ($transfer_point) {
            session()->flash('message', 'Point de transfert modifié avec succès');
            return redirect()->route('admin_transfer_points.index');
        }

        session()->flash('error', "Erreur lors de la modification");
        return redirect()->route("admin_transfer_points.index");
    }

    public function destroy(Request $request)
    {
    }
}
