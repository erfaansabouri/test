<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lottery extends Model {
    use SoftDeletes;

    protected $guarded = [];
    protected $casts   = [
        'started_at' => 'datetime' ,
        'ended_at' => 'datetime' ,
        'winners_announced_at' => 'datetime' ,
    ];

    public function storeLevel () {
        return $this->belongsTo(StoreLevel::class);
    }

    public function participants () {
        return $this->hasMany(LotteryParticipant::class);
    }

    public function winners () {
        return $this->hasMany(LotteryParticipant::class)
                    ->where('is_winner' , true);
    }
}
