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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->decimal('subtotal',11,2);
            $table->decimal('discount',11,2);
            $table->decimal('total',11,2);
            $table->decimal('subtotal_discount',11,2);
            $table->integer('shipping_id');
            $table->integer('shipping_cost');
            $table->string('shipping_status');
            $table->integer('payment_id');
            $table->string('payment_status');
            $table->tinyText('notes');
            $table->string('coupon_code');
            $table->string('s_name');
            $table->string('s_phone');
            $table->string('s_address');
            $table->string('s_ward');
            $table->string('s_district');
            $table->string('s_province');
            $table->string('s_country');
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
