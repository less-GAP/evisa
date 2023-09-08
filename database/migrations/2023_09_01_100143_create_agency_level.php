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
        Schema::create('visa_customer_level', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->tinyInteger('is_default')->default(false);
            $table->integer('min_success_visa_per_month')->default(0);
            $table->longText('price_config')->nullable();
            $table->integer('expire_days')->default(0);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_customer_level');
    }
};
