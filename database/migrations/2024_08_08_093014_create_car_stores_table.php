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
        Schema::create('car_stores', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->unique();
            $table->string('slug')->nullable()->unique();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_open')->nullable()->default(false);
            $table->boolean('is_full')->nullable()->default(false);
            $table->text('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('cs_name')->nullable();
            $table->bigInteger('city_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_stores');
    }
};