<?php

namespace App\Providers;

use App\Events\CustomerDidAPurchasedFromStoreEvent;
use App\Events\CustomerJoinedStoreEvent;
use App\Events\CustomerPurchasedMoreThanAnAmountEvent;
use App\Events\CustomerReceivedNonPurchasePointEvent;
use App\Listeners\AddStarListener;
use App\Listeners\IncreaseCustomerTotalPriceInStoreListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CustomerDidAPurchasedFromStoreEvent::class => [
            AddStarListener::class,
            IncreaseCustomerTotalPriceInStoreListener::class,
        ],
        CustomerJoinedStoreEvent::class => [
            AddStarListener::class,
        ],
        CustomerPurchasedMoreThanAnAmountEvent::class => [
            AddStarListener::class,
        ],
        CustomerReceivedNonPurchasePointEvent::class => [
            AddStarListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
