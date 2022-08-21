<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\AppSetting;
use App\Http\Models\ChangeRate;
use App\Http\Models\User;
use Illuminate\Http\Request;


use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController  extends Controller
{

    public function homeWeb()
    {
        $setting = self::convertDataToObject(false);
        $priceListTogo = ChangeRate::whereForTogo(1)->get();
        $priceListIntl = ChangeRate::whereForTogo(0)->get();
        return view('welcome', compact("setting", "priceListIntl", "priceListTogo"));
    }

    public function login()
    {
        return view('backend/pages/auth/login');
    }

    public function requestLogin(Request $request)
    {
        $login = $request->login;
        $password = $request->password;

        $user = User::whereLogin($login)->with('country')->first();
        if (!$user) {
            session()->put('error', 'Login ou mot de passe incorrecte');
            return back();
        }

        if (!($hashed = Hash::check($password, $user->password))) {
            session()->put('error', 'Login ou mot de passe incorrecte');
            return back();
        }
        // Verify status
        if ($user->status !== 'ACTIVE') {
            session()->flash('error', 'Opération non autorisée. Votre compte est inactif');
            return back();
          }

          // Verify role's level
          if ($user->role_level === '0') {
            session()->flash('error', 'Opération non autorisée. Vous n\'avez pas accès à cet espace');
            return back();
          }


        auth()->loginUsingId($user->id, $request->has('remember_token'));
        session()->put('message', "Bienvenue sur l'espace d'administration");
        return redirect()->route('admin.home');
    }

    public function requestLoginWeb(Request $request)
    {
        $login = $request->input("login");
        $password = $request->input("password");

        $user = User::whereLogin($login)->with('country')->first();
        if (!$user) {
            session()->put('error', 'Login ou mot de passe incorrecte');
            return back();
        }

        if (!($hashed = Hash::check($password, $user->password))) {
            session()->put('error', 'Login ou mot de passe incorrecte');
            return back();
        }

        // Verify status
        if ($user->status !== 'ACTIVE') {
            session()->flash('error', 'Opération non autorisée. Votre compte est inactif');
            return back();
        }

        auth()->loginUsingId($user->id, $request->has('remember_token'));
        session()->put('message', "Bienvenue sur l'espace d'administration");
        return redirect()->route('home.public');
    }

      public function requestLogout(Request $request) {
        auth()->logout();
        return redirect()->route('admin.home');
      }

      public function home() {
        return view('backend/pages/home');
      }

      public function renderSettingsPage() {
        $conversions = self::convertDataToObject(true);
        $setting= AppSetting::first();

        return view('backend/pages/settings', compact("setting", "conversions"));
      }

      public function updateSettings(Request $request) {
        $default_currency = $request->input("default_currency");
        $transfer_accounts = $request->input("transfer_accounts");

        $appSettings = AppSetting::first();
        if(!$appSettings){
          session()->flash('error', 'Paramètres corrompus');
          return redirect()->toRoute('admin_settings');
        }

        $appSettings->default_currency = strtolower(($default_currency ?: $appSettings->defaultCurrency));
        $appSettings->transfer_accounts = $transfer_accounts;
        $appSettings->conversions = $request->input("conversions");

        session()->flash('message', 'Paramètres modifiés avec succès');

        $appSettings->save();
        return back();
      }

    //   public function getTransactions({ request, response }: HttpContextContract) {
    //     const user: User | null = await User.query().preload("remittances").preload("cashInValidated").where("id", request.body()["user_id"] || -1).first();

    //     if (!user) {
    //       return response.status(200).send(JsonApi.error("Resource not found"));
    //     }

    //     const cashIn: Transaction[] = user.cashInValidated;
    //     const remittances: Transaction[] = user.remittances;
    //     const transactions: Transaction[] = [cashIn, remittances].flat().sort((old_t, new_t) => new_t.id - old_t.id);

    //     return response.status(200).send(JsonApi.success(transactions.length + " transaction(s) successfully fetched", transactions));
    //   }

    //   public function getTransactionDetails({ request, response }: HttpContextContract) {
    //     const transaction: Transaction | null = await Transaction.query().preload("payee").preload("payer").where("id", request.param("transaction_id")).first();

    //     if (!transaction) {
    //       return response.status(200).send(JsonApi.error("Error occurred while trying to fetch resource"));
    //     }
    //     return response.status(200).send(JsonApi.success("Transaction successfully fetched", transaction));
    //   }

    //   public function getContacts({ request, response }: HttpContextContract) {
    //     const user: User | null = await User.query().preload("contacts").preload("cashIn").where("id", request.input("user_id", -1)).first();

    //     if (!user) {
    //       return response.status(200).send(JsonApi.error("Resource not found"));
    //     }

    //     const contacts: User[] = user.contacts;
    //     return response.status(200).send(JsonApi.success("OK", contacts));
    //   }

    //   public function addContact({ request, response }: HttpContextContract) {
    //     // const owner:number = request.input("user_id", -1);
    //     const customerName: string = request.input("customer_name", -1);
    //     const customerNumber: string = request.input("customer_number", -1);

    //     const user: User | null = await User.find(request.input("user_id", -1));

    //     if (!user) {
    //       return response.status(200).send(JsonApi.error("Resource not found"));
    //     }

    //     //Check if user exists
    //     const checkUser: User | null = await User.query().where("no_account", customerNumber).first();

    //     if (checkUser && checkUser.id === user.id) {
    //       return response.status(200).send(JsonApi.error("Unauthorized operation"));
    //     }

    //     if (checkUser) {
    //       //Le compte n'était pas t'il déjà lié à l'utilisateur?
    //       const contact: UserContact | null = await UserContact.query().preload('contact').where("user_id", user.id).andWhere("contact_id", checkUser.id).first();

    //       if (contact) {
    //         return response.status(200).send(JsonApi.error("Contact already synced. Check the name '" + contact.contact.name + "' in your contacts"));
    //       }
    //       await user.related("contacts").attach([checkUser.id]);
    //       return response.status(200).send(JsonApi.success("Contact synced with an existing phone number", checkUser));
    //     }

    //     const newUser: User = await user.related("contacts").create({ name: customerName, isTempUser: 1, noAccount: customerNumber, login: customerNumber, password: "1234" });

    //     return response.status(200).send(JsonApi.success("Contact successfully saved", await User.find(newUser.id)));
    //   }

    //   public function addTransferRequest({ request, response }: HttpContextContract) {
    //     // const owner:number = request.input("user_id", -1);
    //     const proofPicture: MultipartFileContract | null = request.file("proof_picture", imageValidation);
    //     if (!proofPicture) {
    //       return response.status(200).send(JsonApi.error("Make sure to attach proof picture"));
    //     }

    //     const amountToTransfer: number = request.input("amount", -1);
    //     const currency: string = request.input("currency", "xof");
    //     const payeeId: number = request.input("payee_id", -1);
    //     const payerId: number = request.input("user_id", -1);

    //     const formData: Partial<Transaction> = {
    //       ref: cuid(),
    //       amount: amountToTransfer,
    //       currency: JSON.stringify({ from: currency, to: (currency === "ghs") ? "xof" : "ghs" }),
    //       payeeId,
    //       payerId,
    //       computedRate: JSON.stringify((await convertDataToObject(true))[0])
    //     };

    //     const payee: User | null = await User.find(payeeId);
    //     const payer: User | null = await User.find(payerId);

    //     if (!payee || !payer) {
    //       return response.status(200).send(JsonApi.error("Payee or Payer not found"));
    //     }

    //     const transaction: Transaction = await Transaction.create(formData);

    //     if (!transaction) {
    //       return response.status(200).send(JsonApi.error("Error occured wile pushing transaction"));
    //     }

    //     if (proofPicture) {
    //       if (proofPicture && proofPicture.isValid) {
    //         const name = `${cuid()}.${proofPicture.extname}`;

    //         proofPicture.move(Application.publicPath(`images/transactions`), {
    //           name, overwrite: true
    //         });

    //         transaction.proofPicture = `transactions/${name}`;
    //         transaction.save();
    //       }
    //     }

    //     return response.status(200).send(JsonApi.success("Transaction successfully saved", transaction));
    //   }

    //   public function getPriceList({ request, response }: HttpContextContract) {

    //     const priceList: ChangeRate[] = await ChangeRate.query().orderBy("id", 'asc');

    //     return response.status(200).send(JsonApi.success(priceList.length + " item(s) successfully", priceList));
    //   }

    //   public function appSettings({ request, response }: HttpContextContract) {

    //     return response.status(200).send(JsonApi.success("Ok", (await convertDataToObject(true))[0]));
    //   }
}
