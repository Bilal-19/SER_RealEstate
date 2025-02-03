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
        Schema::create('booking_inquiry', function (Blueprint $table) {
            $table->id();
            $table->string("company_name");
            $table->string("full_name");
            $table->string("email_address");
            $table->string("phone_number");
            $table->string("budget");
            $table->string("property_size");
            $table->date("check_in");
            $table->date("check_out");
            $table->text("enquiry_message");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_inquiry');
    }
};
