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
        Schema::create('payment_method', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name')->index();
            $table->tinyText('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('A');
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
        Schema::dropIfExists('payment_method');
    }
};
