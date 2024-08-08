<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('trx_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('is_paid')->nullable()->default(false);
            $table->unsignedBigInteger('total_amount')->nullable();
            $table->bigInteger('car_service_id')->nullable()->unsigned();
            $table->bigInteger('car_store_id')->nullable()->unsigned();
            $table->date('started_at')->nullable();
            $table->time('time_at')->nullable();
            $table->timestamps();

            $table->foreign('car_service_id')->references('id')->on('car_services')->onDelete('cascade');
            $table->foreign('car_store_id')->references('id')->on('car_stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_transactions');
    }
};