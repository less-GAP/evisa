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
            $table->string('order_no');
            $table->integer('vat_fee');
            $table->integer('number_of_visa');
            $table->integer('agency_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('type_of_visa');
            $table->datetime('date_arrival');
            $table->string('entry_port');
            $table->string('processing_time');
            $table->datetime('est_delivery_time');
            $table->bigInteger('total_amount');
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('status')->default('pending');
            $table->string('approval_status')->default('pending');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->timestamps();
        });
        Schema::create('visa_application_applicant', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visa_application_id')->index();
            $table->string('full_name');
            $table->integer('nationality');
            $table->string('passport_number');
            $table->string('email');
            $table->string('profile_photo');
            $table->string('passport_photo');
        });
        Schema::create('visa_application_assignee', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visa_application_id')->index();
            $table->string('user')->index();
            $table->integer('created_by');
            $table->timestamps();
        });
        Schema::create('visa_application_history', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visa_application_id')->index();
            $table->string('user')->nullable();
            $table->string('type')->nullable();
            $table->text('comment')->nullable();
            $table->longText('data')->default('[]');
            $table->string('status')->nullable();
            $table->timestamps();
        });
        Schema::create('visa_application_comment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visa_application_id')->index();
            $table->integer('user');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_application');
        Schema::dropIfExists('visa_application_applicant');
        Schema::dropIfExists('visa_application_comment');
        Schema::dropIfExists('visa_application_assignee');
        Schema::dropIfExists('visa_application_history');
    }
};
