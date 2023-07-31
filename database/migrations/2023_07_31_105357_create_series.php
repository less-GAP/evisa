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
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('customer_group')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('series_video', function (Blueprint $table) {
            $table->id();
            $table->string('series_id')->index();
            $table->text('video_id')->nullable();
            $table->text('video_descr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
        Schema::dropIfExists('series_video');
    }
};
