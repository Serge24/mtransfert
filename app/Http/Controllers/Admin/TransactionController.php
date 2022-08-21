<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;

class TransactionController  extends Controller
{
    public function index(Request $request)
    {
        if (connectedSalePoint()) {
            if ((connectedSalePoint()->id == 1 && auth()->user()->id == connectedSalePoint()->manager) || auth()->user()->id == 1) {
                $transactions = Transaction::with("payee", "payer")->get();
            } else {
                $transactions = Transaction::with("payee", "payer")->whereSalePointId(connectedSalePoint()->id)->get();
            }
        }
        else{
            $transactions = Transaction::with("payee", "payer")->get();
        }

        return view('backend.pages.transactions.index', compact("transactions"));
    }

    public function create(Request $request)
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Request $request, $transaction_id)
    {
        $transaction = Transaction::with("payee", "payer")->where('id', $transaction_id)->first();

        if (!$transaction) {
            session()->flash('error', 'Référence de la transaction non trouvée');
            return redirect()->back();
        }


        return view('backend/pages/transactions/show', compact("transaction"));
    }

    public function edit(Request $request, $transaction_id)
    {
        $transaction = Transaction::with("payee", "payer")->where('id', $transaction_id)->first();

        if (!$transaction) {
            session()->flash('error', 'Référence de la transaction non trouvée');
            return back();
        }

        $users = User::all();

        //On charge les contacts de l'expéditeur
        $payees = $transaction->payer->contacts;


        return view('backend/pages/transactions/edit', compact("transaction", "users", "payees"));
    }

    public function update(Request $request, $transaction_id)
    {
        $transaction = Transaction::find($transaction_id);

        if (!$transaction) {
            session()->flash('error', 'Référence de la transaction non trouvée');
            return back();
        }

        $currencyInfo = $request->input('currency', ["from" => 'XOF']);

        $currencyInfo["to"] = (strtolower($currencyInfo["from"]) === 'xof') ? 'GHS' : 'XOF';

        $isValidated = $request->has('isValidated');

        $cancellation_reason = $request->input('cancellation_reason', null);

        if ($cancellation_reason !== null && strlen($cancellation_reason) > 0) {
            $isValidated = 0;
        }

        $data = [
            "amount" => $request->input('amount'),
            "currency" => $currencyInfo,
            "payee_id" => $request->input('payee_id'),
            "cancellation_reason" => $request->input("cancellation_reason"),
            "validated_by" => auth()->user()->id,
            "sale_point_id" => connectedSalePoint()->id
        ];

        if ($isValidated == 1) {
            $data["cancellation_reason"] = null;
            $data["is_validated"] = 1;
        } else {
            $data["validation_picture"] = null;
            $data["is_validated"] = 0;
        }

        $validationPicture = $request->file("validationPicture");
        if ($cancellation_reason === null || strlen($cancellation_reason) <= 0) {
            if (!$validationPicture && ($transaction->is_validated === 0 && $data["is_validated"] === 1)) {
                session()->flash('error', "Opération non permise. Veuillez attacher l'image après traitement.");
                return back();
            }
        }

        $transaction->update($data);

        if ($validationPicture) {
            if ($validationPicture->isValid()) {
                $name = uniqid() . "." . $validationPicture->getClientOriginalExtension();

                $image_path = (env('APP_DEBUG', false) == true) ? public_path("images/transactions/processed") : ("images/transactions/processed");

                $validationPicture->move($image_path, $name);

                $transaction->validation_picture = "transactions/processed/" . $name;
                $transaction->is_validated = true;
                $transaction->cancellation_reason = null;
                $transaction->save();
            } else {
                $error = $validationPicture->getErrorMessage();

                session()->flash('error', "<ol>${error}</ol>");
                return back();
            }
        }

        session()->flash('message', "Modifications effectuées avec succès");
        return back();
    }

    public function destroy(Request $request)
    {
    }
}
