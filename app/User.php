<?php

namespace App;

use App\Http\Models\ApiToken;
use App\Http\Models\Country;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Http\Models\Transaction;
use App\Http\Models\UserAccount;
use App\Http\Models\UserContact;
use App\Http\Models\SalePoint;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    protected $casts = [
        'country_id' => 'int',
        'is_temp_user' => 'int',
        'email_verified_at' => 'datetime'
    ];

    protected $hidden = [
        'password',
        // 'created_at',
        // 'updated_at'
    ];

    protected $fillable = [
        'name',
        'locale',
        'gender',
        'status',
        'role_level',
        'no_account',
        'country_id',
        'image',
        'login',
        'remember_token',
        'password',
        'is_temp_user',
        'sale_point_id',
        'momo_api_key',
        'remember_token'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function salepoint()
    {
        return $this->belongsTo(SalePoint::class, 'sale_point_id');
    }

    public function salepoints()
    {
        return $this->hasMany(SalePoint::class, 'manager');
    }

    public function api_tokens()
    {
        return $this->hasMany(ApiToken::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'validated_by');
    }

    public function remittances()
    {
        return $this->hasMany(Transaction::class, 'payer_id')->with('payee','payer');
    }


    public function remittancesValidated()
    {
        return $this->hasMany(Transaction::class, 'payer_id')->where('is_validated', 1)->with('payee','payer');
    }

    public function cashIn()
    {
        return $this->hasMany(Transaction::class, 'payee_id')->with('payee','payer');
    }

    public function cashInValidated()
    {
        return $this->hasMany(Transaction::class, 'payee_id')->where('is_validated', 1)->with('payee','payer');
    }
    public function user_accounts()
    {
        return $this->hasMany(UserAccount::class);
    }

    public function user_contacts()
    {
        return $this->hasMany(UserContact::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(
            User::class,
            'user_contacts',
            'user_id',
            'contact_id'
        );
    }
}
