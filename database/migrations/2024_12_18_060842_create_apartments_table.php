<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            // General Information
            $table->string('apartment_name');
            $table->string('apartment_location');
            $table->integer('one_bedroom_price');
            $table->integer('two_bedroom_price');
            $table->string('street_address');
            $table->text('map_location');
            $table->integer('sqfeet_area');
            $table->text('description');
            $table->string('status')->default('available');
            $table->string('apartment_type');

            // Set Available Date
            $table->date('available_from');
            $table->date('available_till');

            // Property Images
            $table->string('featured_image');
            $table->text('multiple_images');

            // Latitute and longitude
            $table->float('latitude',10,6)->nullable();
            $table->float('longitude',10,6)->nullable();

            // fav apartment
            $table->boolean('isFavourite')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
