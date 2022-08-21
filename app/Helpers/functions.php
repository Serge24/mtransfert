<?php

use App\Http\Models\User;
use App\User as AppUser;
use Illuminate\Support\Facades\Storage;

if (!function_exists("userinfo")) {
    function userinfo(AppUser $user)
    {
        $levels = [
            'User',
            'Gestionnaire',
            'Administrateur',
            'Super Admin',
        ];

        return (object)[
            "name" => $user->name,
            "level" => $levels[$user->role_level],
            "avatar" => ($user->gender === 'M') ? 'male.png' : 'female.png',
        ];
    }
}

if (!function_exists("connectedSalePoint")) {
    /**
     * @return \App\Http\Models\SalePoint|null
     */
    function connectedSalePoint()
    {
        if(auth()->user()){
            $user = AppUser::find(auth()->user()->id);
            return $user->salepoint;
        }
        return null;
    }
}

if (!function_exists("to_fixed")) {
    function to_fixed($number, int $size = 3)
    {
        $numberToStr = $number . "";
        if (!strpos($numberToStr, ".")) {
            return doubleval($numberToStr . ".00");
        }
        list($integer, $decimal) = explode(".", $numberToStr);
        return doubleval($integer . "." . substr($decimal, 0, $size));
    }
}
