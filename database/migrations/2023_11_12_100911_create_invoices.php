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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index();
            $table->string('class')->index();
            $table->string('class_key')->index();
            $table->string('payment_gateway')->index();
            $table->string('invoice_id')->index();
            $table->string('order_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('payment_url')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
