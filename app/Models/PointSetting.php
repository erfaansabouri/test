<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointSetting extends Model
{
    protected $guarded = [];

    public static function calculatePoint($price){
        $setting = self::query()->firstOrFail();
        return (int)(($price * $setting->point) / $setting->price);
    }
}
