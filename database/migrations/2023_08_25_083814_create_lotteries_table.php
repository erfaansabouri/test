<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up (): void {
		Schema::create('lotteries' , function ( Blueprint $table ) {
			$table->id();
			$table->unsignedBigInteger('store_id')
				  ->nullable();
			$table->string('title')
				  ->nullable();
			$table->string('description')
				  ->nullable();
			$table->integer('capacity')
				  ->nullable();
            $table->integer('max_winners_count')
                  ->default(1);
            $table->integer('points')
                  ->nullable();
			$table->unsignedBigInteger('store_level_id')
				  ->nullable();
			$table->timestamp('started_at')
				  ->nullable();
			$table->timestamp('ended_at')
				  ->nullable();
			$table->timestamp('winners_announced_at')
				  ->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down (): void {
		Schema::dropIfExists('lotteries');
	}
};
