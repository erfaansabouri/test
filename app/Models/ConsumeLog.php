<?php

namespace App\Models;

use App\Events\ConsumeLogCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumeLog extends Model {
    protected $table = 'consume_logs';
    protected $guarded = [];

    protected static function booted () {
        static::created(function ( ConsumeLog $consume_log ) {
            if ($consume_log->store_id && $consume_log->customer_id){
                ConsumeLogCreatedEvent::dispatch($consume_log->id);
            }
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
