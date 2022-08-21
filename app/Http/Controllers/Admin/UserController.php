<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\SalePoint;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //\DB::enableQueryLog(); // Enable query log
        $canEdit = true;
        $usersQuery = User::where('id', '<>', 1)->where('id', '<>', auth()->user()->id);

        if(connectedSalePoint() != null){
            if((connectedSalePoint()->id == 1 && connectedSalePoint()->manager == auth()->user()->id) || auth()->user()->id == 1 ){
                $users = $usersQuery->get();
                $canEdit = true;
            }else{
                $users = (clone $usersQuery)->whereSalePointId(connectedSalePoint()->id)->get();
            }
        }else{
            $users = $usersQuery->get();
        }
        //dd(\DB::getQueryLog()); // Show results of log

        return view('backend/pages/users/index', compact("users", "canEdit"));
    }

    public function create(Request $request)
    {
        $sale_points = SalePoint::get();
        return view('backend/pages/users/create',  compact("sale_points"));
    }

      public function store(Request $request) {
        $user= User::where('no_account', $request->input('no_account', -1))->first();

        if ($user) {
          session()->flash('error', "Un utilisateur existe déjà avec ce numéro. Veuiller vérifier le compte '" . $request->name ."'");
          return redirect()->route('admin_users.index');
        }

        $data = $request->except(["_token", "passwordConfirm", "password"]);

        $data["password"] = bcrypt($request->input("password"));

        $newUser = User::create($data);
        if($newUser){
            session()->flash('message', 'Utilisateur enrégistré avec succès');
            return redirect()->route('admin_users.index');
        }

        session()->flash('error', "Erreur lors de l'enregistrement");
        return redirect()->back();
      }

      public function show(Request $request, $user_id) {
        $user = User::query()
          ->with('cashInValidated','remittances')
          ->where('id', $user_id)
          ->first();

        if (!$user) {
          session()->flash('error', "Référence de l'utilisateur non trouvée");
          return redirect()->route('admin_users.index');
        }

        $transactions= collect()->concat($user->cashInValidated)->concat($user->remittances)->sort(function($old_t, $new_t){
            return $new_t->id - $old_t->id;
        });

        return view('backend/pages/users/show', compact("user","transactions"));
      }

      public function editTransaction(Request $request, int $user_id) {
        $transaction = Transaction::with("payee")->with(["payer"=>function($query){
            $query->with("contacts");
        }])->where('id', $user_id)->first();

        $selectedUser = User::find($user_id);
        if (!$selectedUser) {
          session()->flash('error', 'Resource non trouvée');
          return redirect()->back();
        }

        if (!$transaction) {
          session()->flash('error', 'Référence de la transaction non trouvée');
          return redirect()->back();
        }

        $users = User::all();
        $payees = $transaction->payer->contacts;

        return view('backend/pages/transactions/edit', compact("transaction", "users", "payees", "selectedUser"));
      }

    public function edit(Request $request, int $user_id)
    {
        $user = User::with(['cashInValidated', 'remittances'])->where('id', $user_id)->first();

        if (!$user) {
            session()->flash('error', "Référence de l'utilisateur non trouvée");
            return redirect()->route('admin_users.index');
        }

        return view('backend/pages/users/edit', compact('user'));
    }

    public function update(Request $request, int $user_id)
    {
        $user = User::whereId($user_id)->first();

        if (!$user) {
            session()->flash('error', "Référence de l'utilisateur non trouvée");
            return redirect()->route('admin_users.index');
        }

        $data = $request->except(['_token', 'passwordConfirm', 'password']);

        if (!$request->has('password')) {
            unset($data["password"]);
        } else {
            if ($request->input("password", null) && $request->input("passwordConfirm", null)) {
                if($request->input("password", null) == $request->input("passwordConfirm", null)){
                    $data["password"] = bcrypt($request->input("password"));
                }else{
                    session()->flash('error', 'Veuillez revoir les mots de passe');
                    return back();
                }
            }
        }

        $data["status"] = $request->input('status', 'INACTIVE');

        $user->update($data);
        session()->flash('message', 'Modification effectuées avec succès');
        return redirect()->route('admin_users.index');
    }

    public function destroy(Request $request) {

     }
}
