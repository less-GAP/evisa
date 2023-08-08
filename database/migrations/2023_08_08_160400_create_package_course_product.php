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
        Schema::create('package_course_product', function (Blueprint $table) {
            $table->id();
            $table->integer('package_course_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->longText('product_descr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_course_product');
    }
};
