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
        Schema::create('package_course', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('name')->nullable();
            $table->string('time')->nullable();
            $table->decimal('price', 11, 2)->nullable();
            $table->integer('point')->nullable();
            $table->integer('stock')->nullable();
            $table->text('short_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_course');
    }
};
