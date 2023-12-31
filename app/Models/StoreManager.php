<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class StoreManager extends Authenticatable implements HasMedia
{
    use Notifiable, HasRoles, InteractsWithMedia;

    protected $guard = 'store-manager';
    protected $guarded = [];

    const PERMISSIONS = [
        'store-managers' => 'کارمندان',
        'customers' => 'مشتریان',
        'points' => 'امتیاز ها',
        'store-settings' => 'تنظیمات سطح بندی مشتریان',
        'stars' => 'ستاره های مشتریان',
        'charts' => 'نمودار ها',
        'calendar' => 'تقویم',
        'coupon-generators' => 'تنظیمات کوپن های اتوماتیک',
        'special-sales' => 'فروش ویژه',
        'coupons' => 'کوپن ها',
        'awards' => 'جایزه ها',
        'lotteries' => 'قرعه کشی ها',
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->useFallbackUrl(asset('global-assets/media/avatars/blank.png'))
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->quality(80);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
