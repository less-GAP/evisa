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
        Schema::create('visa_application', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_visa');
            $table->string('type_of_visa');
            $table->datetime('date_arrival');
            $table->string('entry_port');
            $table->string('processing_time');
            $table->datetime('est_delivery_time');
            $table->bigInteger('total_amount');
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('mobile_phone');
            $table->timestamps();
        });
        Schema::create('visa_application_document', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->integer('nationality');
            $table->string('passport_number');
            $table->string('email');
            $table->string('profile_photo');
            $table->string('passport_photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_application');
        Schema::dropIfExists('visa_application_document');
    }
};
