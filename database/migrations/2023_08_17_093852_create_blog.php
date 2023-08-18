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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('status')->index();
            $table->string('title')->index();
            $table->string('url')->index();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('back_links', function (Blueprint $table) {
            $table->id();
            $table->string('status')->index();
            $table->string('title')->index();
            $table->string('url')->index();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
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
            $table->string('source_url')->index()->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('country')->index()->nullable();
            $table->bigInteger('visit_count')->index()->nullable();
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->string('post_id')->index();
            $table->string('tag_id')->index();
        });
        Schema::create('back_link_tag', function (Blueprint $table) {
            $table->id();
            $table->string('back_link_id')->index();
            $table->string('tag_id')->index();
        });
        Schema::create('ad_tag', function (Blueprint $table) {
            $table->id();
            $table->string('ad_id')->index();
            $table->string('tag_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('back_links');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('back_link_tag');
        Schema::dropIfExists('ad_tag');
    }
};
