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
        Schema::create('store_photos', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->bigInteger('car_store_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('car_store_id')->references('id')->on('car_stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_photos');
    }
};