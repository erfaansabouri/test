<?php

namespace App\Services;
use Carbon\Carbon;

class DateServices
{
    public static function jalaliToCarbon($jalali_date){
        $exploded = explode('/', $jalali_date);
        $georgian_array = (\Verta::jalaliToGregorian($exploded[0], $exploded[1], $exploded[2]));
        $georgian_ymd = $georgian_array[0] . '-' . $georgian_array[1] . '-' . $georgian_array[2];
        return Carbon::parse($georgian_ymd);
    }
}
