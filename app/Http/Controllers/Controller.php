<?php

namespace App\Http\Controllers;

use App\Http\Models\AppSetting;
use App\Http\Models\ChangeRate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getChangeRateValue(float $amount, bool $for_togo = false)
    {
        //\DB::enableQueryLog(); // Enable query log

        $rateQuery = ChangeRate::whereForTogo($for_togo ? 1 : 0);

        $rate = (clone $rateQuery)->where('end', '>=', $amount)->first();

        //dd(\DB::getQueryLog()); // Show results of log
        if (!$rate) {
            if ($amount > 0) {
                return $rateQuery->get()->last();
            } else {
                return $rateQuery->get()->first();
            }
        }
        return $rate;
    }

    public static function convertDataToObject(bool $onlyData)
    {
        $data = AppSetting::first();

        if ($data) {
            if ($onlyData) {
                return $data->conversions;
            }
        }
        return $data;
    }
}
