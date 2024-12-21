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
            $table->string('area_name');
            $table->integer('price');
            $table->integer('price_per_night');
            $table->string('street_address');
            $table->text('map_location');
            $table->enum('total_bedrooms', [1, 2, 3, 4, 5, 6]);
            $table->enum('total_bathrooms', [1, 2, 3]);
            $table->string('description');

            // Set Available Date
            $table->date('availableFrom');
            $table->date('availableTill');

            // Property Images
            $table->string('featuredImage');
            $table->text('multipleImages');

            // Property Reviews
            $table->integer('cleanlinessVal');
            $table->integer('comfortVal');
            $table->integer('facilitiesVal');
            $table->integer('locationVal');
            $table->integer('staffVal');
            $table->integer('value_for_money');
            $table->integer('free_wifi_val');

            // Latitute and longitude
            $table->float('latitude');
            $table->float('longitude');

            // Property Amenities
            // $table->enum('haveInternet', ['Yes', 'No']);
            // $table->enum('haveKitchen', ['Yes', 'No']);
            // $table->enum('haveLivingArea', ['Yes', 'No']);
            // $table->enum('haveBedroom', ['Yes', 'No']);
            // $table->enum('haveRoomAmenities', ['Yes', 'No']);
            // $table->enum('haveBuildingCharacteristics', ['Yes', 'No']);
            // $table->enum('haveParking', ['Yes', 'No']);
            // $table->enum('haveOutdoorView', ['Yes', 'No']);
            // $table->enum('haveMediaAndTechnology', ['Yes', 'No']);
            // $table->enum('haveBathroom', ['Yes', 'No']);
            // $table->enum('havePets', ['Yes', 'No']);
            // $table->enum('haveMiscellaneous', ['Yes', 'No']);
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
