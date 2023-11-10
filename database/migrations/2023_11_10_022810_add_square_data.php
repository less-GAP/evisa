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
        Schema::table('visa_application', function (Blueprint $table) {
            $table->string('square_payment_url')->nullable();
            $table->string('square_order_id')->nullable();
            $table->string('square_customer_id')->nullable();
            $table->string('square_invoice_id')->nullable();
        });
        Schema::create('square_customers', function (Blueprint $table) {
            $table->id();
            $table->string('square_customer_id')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visa_application', function (Blueprint $table) {
            $table->dropColumn('square_payment_url')->nullable();
            $table->dropColumn('square_order_id')->nullable();
            $table->dropColumn('square_customer_id')->nullable();
            $table->dropColumn('square_invoice_id')->nullable();
        });
        Schema::drop('square_customers');
    }
};
