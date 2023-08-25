<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up (): void {
		Schema::create('awards' , function ( Blueprint $table ) {
			$table->id();
            $table->unsignedBigInteger('store_id')->nullable()->index();
			$table->string('type')->nullable();
            $table->string('code')->nullable()->index();
			$table->string('title')->nullable();
			$table->text('description')->nullable();
			$table->string('points')->nullable();
            $table->unsignedBigInteger('purchased_by_customer_id')->nullable();
            $table->timestamp('purchased_at')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down (): void {
		Schema::dropIfExists('awards');
	}
};
