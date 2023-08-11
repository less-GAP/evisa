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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('sex')->nullable();
            $table->string('birthday')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('D');
            $table->integer('customer_group');
            $table->string('referral_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
