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
            $table->string('area');
            $table->string('street_address');
            $table->integer('price');
            $table->string('feedback');
            $table->string('rating');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('description');
            $table->string('neighborhood_image');
            $table->string('location');

            // Property Reviews
            $table->integer('cleanlinessVal');
            $table->integer('comfortVal');
            $table->integer('facilitiesVal');
            $table->integer('locationVal');
            $table->integer('staffVal');
            $table->integer('value_for_money');
            $table->integer('free_wifi_val');

            // Property Amenities
            $table->enum('haveInternet', ['Yes', 'No']);
            $table->enum('haveKitchen', ['Yes', 'No']);
            $table->enum('haveLivingArea', ['Yes', 'No']);
            $table->enum('haveBedroom', ['Yes', 'No']);
            $table->enum('haveRoomAmenities', ['Yes', 'No']);
            $table->enum('haveBuildingCharacteristics', ['Yes', 'No']);
            $table->enum('haveParking', ['Yes', 'No']);
            $table->enum('haveOutdoorView', ['Yes', 'No']);
            $table->enum('haveMediaAndTechnology', ['Yes', 'No']);
            $table->enum('haveBathroom', ['Yes', 'No']);
            $table->enum('havePets', ['Yes', 'No']);
            $table->enum('haveMiscellaneous', ['Yes', 'No']);
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
