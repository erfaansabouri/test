<?php

namespace App\Console\Commands;

use App\Models\Coupon;
use App\Models\CouponGenerator;
use App\Models\Customer;
use App\Models\Enums\CouponGeneratorTypeEnums;
use App\Models\Point;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CouponGeneratorCommand extends Command {
    protected $signature   = 'generate-coupon {type}';
    protected $description = 'Command description';

    public function handle () {
        $type = $this->argument('type');
        switch ( $type ) {
            case CouponGeneratorTypeEnums::Forgetfulness:
                $this->handleForgetfulness();
                break;
            case CouponGeneratorTypeEnums::PurchasesCount:
                $this->handlePurchasesCount();
                break;
            case CouponGeneratorTypeEnums::PurchaseAmount:
                $this->handlePurchaseAmount();
                break;
            case CouponGeneratorTypeEnums::Birthday:
                $this->handleBirthday();
                break;
            case CouponGeneratorTypeEnums::Register:
                $this->handleRegister();
                break;
        }

        return Command::SUCCESS;
    }

    public function handleForgetfulness () {
        $stores = Store::whereHas('couponGenerators' , function ( $query ) {
            $query->where('type' , CouponGeneratorTypeEnums::Forgetfulness);
        })
                       ->get();
        foreach ( $stores as $store ) {
            $total_generated = 0;
            $customers = $store->customers;
            foreach ( $customers as $customer ) {
                $candidate = $this->generateForgetfulnessCoupon($customer , $store);
                if ( $candidate ) {
                    $total_generated++;
                }
            }
            $this->info('STORE ID: ' . $store->id . ' | ' . CouponGeneratorTypeEnums::Forgetfulness . ' | ' . $total_generated . ' Count.');
        }
    }

    public function generateForgetfulnessCoupon ( $customer , $store ) {
        $coupon_generator = CouponGenerator::query()
                                           ->where('type' , CouponGeneratorTypeEnums::Forgetfulness)
                                           ->where('store_id' , $store->id)
                                           ->first();
        $already_exist = Coupon::query()
                               ->where('customer_id' , $customer->id)
                               ->where('store_id' , $store->id)
                               ->where('coupon_generator_id' , $coupon_generator->id)
                               ->where('coupon_generator_type' , CouponGeneratorTypeEnums::Forgetfulness)
                               ->exists();
        if ( $already_exist ) {
            return;
        }
        $last_point = Point::query()
                           ->where('customer_id' , $customer->id)
                           ->where('store_id' , $store->id)
                           ->latest()
                           ->first();
        $candidate = $last_point && Carbon::now()
                                          ->diffInDays($last_point->created_at) > $coupon_generator->meta_data[ 'forgetfulness_days_count' ];
        if ( $candidate ) {
            Coupon::query()
                  ->create([
                               'store_id' => $store->id ,
                               'customer_id' => $customer->id ,
                               'code' => Coupon::generateCode() ,
                               'discount_percent' => $coupon_generator->discount_percent ,
                               'discount_ceiling' => $coupon_generator->discount_ceiling ,
                               'coupon_generator_id' => $coupon_generator->id ,
                               'coupon_generator_type' => CouponGeneratorTypeEnums::Forgetfulness ,
                               'expired_at' => now()->addDays($coupon_generator->days_count) ,
                           ]);

            return true;
        }

        return false;
    }

    /* PURCHASES COUNT */
    public function handlePurchasesCount () {
        $stores = Store::whereHas('couponGenerators' , function ( $query ) {
            $query->where('type' , CouponGeneratorTypeEnums::PurchasesCount);
        })
                       ->get();
        foreach ( $stores as $store ) {
            $total_generated = 0;
            $customers = $store->customers;
            foreach ( $customers as $customer ) {
                $candidate = $this->generatePurchasesCountCoupon($customer , $store);
                if ( $candidate ) {
                    $total_generated++;
                }
            }
            $this->info('STORE ID: ' . $store->id . ' | ' . CouponGeneratorTypeEnums::PurchasesCount . ' | ' . $total_generated . ' Count.');
        }
    }

    public function generatePurchasesCountCoupon ( $customer , $store ) {
        $coupon_generator = CouponGenerator::query()
                                           ->where('type' , CouponGeneratorTypeEnums::PurchasesCount)
                                           ->where('store_id' , $store->id)
                                           ->first();
        $already_exist = Coupon::query()
                               ->where('customer_id' , $customer->id)
                               ->where('store_id' , $store->id)
                               ->where('coupon_generator_id' , $coupon_generator->id)
                               ->where('coupon_generator_type' , CouponGeneratorTypeEnums::PurchasesCount)
                               ->exists();
        if ( $already_exist ) {
            return;
        }
        $points_count = Point::query()
                             ->where('customer_id' , $customer->id)
                             ->where('store_id' , $store->id)
                             ->count();
        $candidate = $points_count > $coupon_generator->meta_data[ 'purchases_count' ];
        if ( $candidate ) {
            Coupon::query()
                  ->create([
                               'store_id' => $store->id ,
                               'customer_id' => $customer->id ,
                               'code' => Coupon::generateCode() ,
                               'discount_percent' => $coupon_generator->discount_percent ,
                               'discount_ceiling' => $coupon_generator->discount_ceiling ,
                               'coupon_generator_id' => $coupon_generator->id ,
                               'coupon_generator_type' => CouponGeneratorTypeEnums::PurchasesCount ,
                               'expired_at' => now()->addDays($coupon_generator->days_count) ,
                           ]);

            return true;
        }

        return false;
    }

    /* PURCHASE AMOUNT */
    public function handlePurchaseAmount () {
        $stores = Store::whereHas('couponGenerators' , function ( $query ) {
            $query->where('type' , CouponGeneratorTypeEnums::PurchaseAmount);
        })
                       ->get();
        foreach ( $stores as $store ) {
            $total_generated = 0;
            $customers = $store->customers;
            foreach ( $customers as $customer ) {
                $candidate = $this->generatePurchaseAmountCoupon($customer , $store);
                if ( $candidate ) {
                    $total_generated++;
                }
            }
            $this->info('STORE ID: ' . $store->id . ' | ' . CouponGeneratorTypeEnums::PurchaseAmount . ' | ' . $total_generated . ' Count.');
        }
    }

    public function generatePurchaseAmountCoupon ( $customer , $store ) {
        $coupon_generator = CouponGenerator::query()
                                           ->where('type' , CouponGeneratorTypeEnums::PurchaseAmount)
                                           ->where('store_id' , $store->id)
                                           ->first();
        $already_exist = Coupon::query()
                               ->where('customer_id' , $customer->id)
                               ->where('store_id' , $store->id)
                               ->where('coupon_generator_id' , $coupon_generator->id)
                               ->where('coupon_generator_type' , CouponGeneratorTypeEnums::PurchaseAmount)
                               ->exists();
        if ( $already_exist ) {
            return;
        }
        $sum_of_prices = Point::query()
                              ->where('customer_id' , $customer->id)
                              ->where('store_id' , $store->id)
                              ->sum('price');
        $candidate = $sum_of_prices > $coupon_generator->meta_data[ 'purchase_amount' ];
        if ( $candidate ) {
            Coupon::query()
                  ->create([
                               'store_id' => $store->id ,
                               'customer_id' => $customer->id ,
                               'code' => Coupon::generateCode() ,
                               'discount_percent' => $coupon_generator->discount_percent ,
                               'discount_ceiling' => $coupon_generator->discount_ceiling ,
                               'coupon_generator_id' => $coupon_generator->id ,
                               'coupon_generator_type' => CouponGeneratorTypeEnums::PurchaseAmount ,
                               'expired_at' => now()->addDays($coupon_generator->days_count) ,
                           ]);

            return true;
        }

        return false;
    }

    /* BIRTHDAY */
    public function handleBirthday () {
        $total_generated = 0;
        $customers = Customer::whereMonth('birthdate' , Carbon::now()->month)
                             ->whereDay('birthdate' , Carbon::now()->day)
                             ->get();
        foreach ( $customers as $customer ) {
            $candidate = $this->generateBirthdayCoupon($customer);
            if ( $candidate ) {
                $total_generated++;
            }
        }
        $this->info(CouponGeneratorTypeEnums::Birthday . ' | ' . $total_generated . ' Count.');
    }

    public function generateBirthdayCoupon ( $customer ) {
        $coupon_generator = CouponGenerator::query()
                                           ->where('type' , CouponGeneratorTypeEnums::Birthday)
                                           ->first();
        if ( !$coupon_generator ) {
            return false;
        }
        $already_exist = Coupon::query()
                               ->where('customer_id' , $customer->id)
                               ->where('coupon_generator_id' , $coupon_generator->id)
                               ->where('coupon_generator_type' , CouponGeneratorTypeEnums::Birthday)
                               ->whereYear('created_at' , Carbon::now()->year)
                               ->exists();
        if ( $already_exist ) {
            return false;
        }
        Coupon::query()
              ->create([
                           'customer_id' => $customer->id ,
                           'code' => Coupon::generateCode() ,
                           'discount_percent' => $coupon_generator->discount_percent ,
                           'discount_ceiling' => $coupon_generator->discount_ceiling ,
                           'coupon_generator_id' => $coupon_generator->id ,
                           'coupon_generator_type' => CouponGeneratorTypeEnums::Birthday ,
                           'expired_at' => now()->addDays($coupon_generator->days_count) ,
                       ]);

        return true;
    }

    /* Register */

    public function handleRegister(){
        $total_generated = 0;
        $customers = Customer::whereMonth('created_at' , Carbon::now()->month)
                             ->whereDay('created_at' , Carbon::now()->day)
                             ->whereYear('created_at' , Carbon::now()->year)
                             ->get();
        foreach ( $customers as $customer ) {
            $candidate = $this->generateRegisterCoupon($customer);
            if ( $candidate ) {
                $total_generated++;
            }
        }
        $this->info(CouponGeneratorTypeEnums::Register . ' | ' . $total_generated . ' Count.');
    }

    public function generateRegisterCoupon ( $customer ) {
        $coupon_generator = CouponGenerator::query()
                                           ->where('type' , CouponGeneratorTypeEnums::Register)
                                           ->first();
        if ( !$coupon_generator ) {
            return false;
        }
        $already_exist = Coupon::query()
                               ->where('customer_id' , $customer->id)
                               ->where('coupon_generator_id' , $coupon_generator->id)
                               ->where('coupon_generator_type' , CouponGeneratorTypeEnums::Register)
                               ->exists();
        if ( $already_exist ) {
            return false;
        }
        Coupon::query()
              ->create([
                           'customer_id' => $customer->id ,
                           'code' => Coupon::generateCode() ,
                           'discount_percent' => $coupon_generator->discount_percent ,
                           'discount_ceiling' => $coupon_generator->discount_ceiling ,
                           'coupon_generator_id' => $coupon_generator->id ,
                           'coupon_generator_type' => CouponGeneratorTypeEnums::Register ,
                           'expired_at' => now()->addDays($coupon_generator->days_count) ,
                       ]);

        return true;
    }
}
