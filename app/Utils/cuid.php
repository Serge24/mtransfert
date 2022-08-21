<?php
namespace App\Utils;

define("PATTERN", "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" );

class cuid{
    public static function make($size=6)
    {

        $charArry = str_split(PATTERN);

        $ch1 = $charArry[rand(0, 35)];
        $ch2 = $charArry[rand(0, 35)];
        $ch3 = $charArry[rand(0, 35)];
        $ch4 = $charArry[rand(0, 35)];
        $ch5 = $charArry[rand(0, 35)];
        $ch6 = $charArry[rand(0, 35)];

        return $ch1.$ch2.$ch3.$ch4.$ch5.$ch6;
    }
}
