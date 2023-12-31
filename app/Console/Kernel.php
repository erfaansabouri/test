<?php

namespace App\Console;

use App\Models\Enums\CouponGeneratorTypeEnums;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('official-calendar')->hourly();
        $schedule->command('special-sale')->daily();
        $schedule->command('lottery')->daily();
        $schedule->command('generate-coupon ' . CouponGeneratorTypeEnums::Register)->daily();
        $schedule->command('generate-coupon ' . CouponGeneratorTypeEnums::Birthday)->daily();
        $schedule->command('generate-coupon ' . CouponGeneratorTypeEnums::PurchaseAmount)->everyMinute();
        $schedule->command('generate-coupon ' . CouponGeneratorTypeEnums::PurchasesCount)->everyMinute();
        $schedule->command('generate-coupon ' . CouponGeneratorTypeEnums::Forgetfulness)->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
