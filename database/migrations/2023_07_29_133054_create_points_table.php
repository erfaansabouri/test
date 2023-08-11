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
        Schema::create('point_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('type_fa')->nullable();
            $table->timestamps();
        });

        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('price')->nullable();
            $table->integer('point')->default(1);
            $table->string('point_type_id')->nullable();
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('point_types');
        Schema::dropIfExists('points');
    }
};
