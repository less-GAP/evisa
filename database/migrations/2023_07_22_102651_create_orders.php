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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->decimal('subtotal', 11, 2)->nullable();
            $table->decimal('discount', 11, 2)->nullable();
            $table->decimal('total', 11, 2)->nullable();
            $table->decimal('subtotal_discount', 11, 2)->nullable();
            $table->integer('shipping_id')->nullable();
            $table->decimal('shipping_cost', 11, 2)->nullable();
            $table->string('shipping_status')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->tinyText('notes')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('s_name')->nullable();
            $table->string('s_phone')->nullable();
            $table->string('s_address')->nullable();
            $table->string('s_ward')->nullable();
            $table->string('s_district')->nullable();
            $table->string('s_province')->nullable();
            $table->string('s_country')->nullable();
            $table->string('order_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
