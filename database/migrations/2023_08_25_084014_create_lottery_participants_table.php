<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up (): void {
		Schema::create('lottery_participants' , function ( Blueprint $table ) {
			$table->id();
            $table->unsignedBigInteger('lottery_id')
                  ->nullable();
			$table->unsignedBigInteger('customer_id')
				  ->nullable();
			$table->boolean('is_winner')
				  ->nullable();
			$table->string('winner_code')
				  ->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down (): void {
		Schema::dropIfExists('lottery_participants');
	}
};
