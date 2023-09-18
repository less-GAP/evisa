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
        Schema::create('taxonomy', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->index()->nullable();
            $table->string('type')->index();
        });
        Schema::create('taxonomy_model', function (Blueprint $table) {
            $table->id();
            $table->integer('taxonomy_id')->index();
            $table->string('class')->index();
            $table->string('class_key')->index();
        });
        Schema::table('taxonomy_model', function (Blueprint $table) {
            $table->unique(['taxonomy_id', 'class', 'class_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxonomy');
        Schema::dropIfExists('taxonomy_model');
    }
};
