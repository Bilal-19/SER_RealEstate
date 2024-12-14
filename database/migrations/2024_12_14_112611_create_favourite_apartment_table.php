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
        Schema::create('favourite_apartment', function (Blueprint $table) {
            $table->id();
            $table->string('featured_image');
            $table->string('apartment_name');
            $table->string('apartment_location');
            $table->integer('apartment_price');
            $table->integer('totalBedrooms');
            $table->integer('totalBathrooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourite_apartment');
    }
};
