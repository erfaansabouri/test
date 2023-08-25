<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class LotteryParticipant extends Model {
    use SoftDeletes;

    protected $guarded = [];

    public function lottery () {
        return $this->belongsTo(Lottery::class);
    }

    public function customer () {
        return $this->belongsTo(Customer::class);
    }

    public static function generateCode () {
        $code = strtoupper(Str::random(8));
        if ( LotteryParticipant::whereWinnerCode($code)
                               ->exists() ) {
            return self::generateCode();
        }

        return $code;
    }
}
