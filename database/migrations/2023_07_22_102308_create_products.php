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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->index();
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price',11,2)->default(0);
            $table->decimal('sale_price',11,2)->default(0);
            $table->decimal('point',11,2)->default(0);
            $table->integer('stock')->default(0);
            $table->string('status')->default('D');
            $table->string('type')->default('product')->index();
            $table->string('title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
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
        Schema::dropIfExists('products');
    }
};
