<?php

namespace App\Console\Commands;

use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Enums\CouponGeneratorTypeEnums;
use App\Models\Point;
use App\Models\SpecialSale;
use App\Models\Store;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SpecialSaleCommand extends Command {
    protected $signature   = 'special-sale';
    protected $description = 'Command description';

    public function handle () {
        $special_sales = SpecialSale::live()
                                    ->get();
        foreach ( $special_sales as $special_sale ) {
            $this->handleSpecialSale($special_sale);
        }

        return Command::SUCCESS;
    }

    public function handleSpecialSale ( SpecialSale $special_sale ) {
        $store = $special_sale->store;
        $customer_ids = Point::whereBetween('created_at' , [
            $special_sale->started_at ,
            $special_sale->ended_at ,
        ])
                             ->pluck('customer_id');
        $count = 0;
        $customers = Customer::whereIn('id' , $customer_ids)
                             ->get();
        foreach ( $customers as $customer ) {
            $candidate = $this->generateCoupon($customer , $store , $special_sale);
            if ($candidate){
                $count++;
            }
        }
        $this->info($count);
    }

    public function generateCoupon ( Customer $customer , Store $store , SpecialSale $special_sale ) {
        $level = $customer->getLevel($store);
        $sum_purchase = Point::whereBetween('created_at' , [
            $special_sale->started_at ,
            $special_sale->ended_at ,
        ])
                             ->where('customer_id' , $customer->id)
                             ->where('store_id' , $store->id)
                             ->sum('price');
        $already_exist = Coupon::query()
                               ->where('customer_id' , $customer->id)
                               ->where('store_id' , $store->id)
                               ->where('special_sale_id' , $special_sale->id)
                               ->exists();
        if ( $already_exist ) {
            return false;
        }
        if ( $level && $level->id == $special_sale->store_level_id && $sum_purchase >= $special_sale->lower_purchase_amount && $sum_purchase <= $special_sale->upper_purchase_amount ) {
            Coupon::query()
                  ->create([
                               'store_id' => $store->id ,
                               'customer_id' => $customer->id ,
                               'code' => Coupon::generateCode() ,
                               'discount_percent' => $special_sale->discount_percent ,
                               'discount_ceiling' => $special_sale->discount_ceiling ,
                               'special_sale_id' => $special_sale->id ,
                           ]);
            return true;
        }
        return false;
    }
}
