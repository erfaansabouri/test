<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard = 'admin';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    const PERMISSIONS = [
        'admins' => 'کارشناس ها',
        'stores' => 'فروشگاه ها',
        'customers' => 'مشتری ها',
        'points' => 'امتیاز ها',
        'charts' => 'نمودار ها',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
