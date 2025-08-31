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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('category');
            $table->string('seating_capacity');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->string('pricePerDay');
            $table->string('location');
            $table->integer('isAvailable')->default(1);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('owner_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};