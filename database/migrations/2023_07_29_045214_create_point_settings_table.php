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
        Schema::create('point_settings', function (Blueprint $table) {
            $table->id();
            $table->string('price')->nullable();
            $table->string('point')->nullable();
            $table->timestamps();
        });
        \App\Models\PointSetting::query()
                                ->create([
                                             'price' => 100000 ,
                                             'point' => 3 ,
                                         ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_settings');
    }
};
