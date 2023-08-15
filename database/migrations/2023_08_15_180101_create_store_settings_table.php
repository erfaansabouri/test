<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->integer('customer_completed_profile_event_stars')->default(0);
            $table->integer('customer_did_a_purchased_from_store_event_stars')->default(0);
            $table->integer('customer_joined_store_event_stars')->default(0);
            $table->integer('customer_purchased_more_than_amount')->default(0);
            $table->integer('customer_purchased_more_than_amount_event_stars')->default(0);
            $table->integer('customer_received_non_purchase_point_event_stars')->default(0);
            $table->integer('customer_referred_a_friend_event_stars')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_settings');
    }
};
