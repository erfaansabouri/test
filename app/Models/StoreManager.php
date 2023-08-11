<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class StoreManager extends Authenticatable
{
    use Notifiable, HasRoles;
    protected $guard = 'store-manager';
    protected $guarded = [];

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
