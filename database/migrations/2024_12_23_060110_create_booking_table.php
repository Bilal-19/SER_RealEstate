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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            // Personal Information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('postal_code');
            $table->string('country');
            $table->text('message');
            $table->string('payment_status')->default('Pending');
            $table->string('is_agree_to_terms');
            $table->string('is_agree_to_marketing');
            $table->integer('totalAdults');
            $table->integer('totalChildrens');

            // Booking Details
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('total_days_to_stay');
            $table->integer('total_amount');

            // Bank Account Details
            $table->string('account_title');
            $table->string('card_number');
            $table->string('card_verification_code');
            $table->string('expiration_month');
            $table->string('expiration_year');

            $table->unsignedBigInteger('apartment_id');

            // Foreign key reference
            $table->foreign('apartment_id')->references('id')->on('apartments')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
