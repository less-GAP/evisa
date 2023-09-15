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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->string('type')->index();
            $table->string('status')->index();
            $table->string('image')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->integer('data_source_id')->index()->nullable();
            $table->string('source_url')->unique()->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
//            $table->longText('meta')->nullable();
            $table->string('country')->index()->nullable();
            $table->bigInteger('visit_count')->index()->nullable();
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('class')->index();
            $table->string('class_key')->index();
            $table->string('name')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
    }
};
