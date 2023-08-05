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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->index();
            $table->string('title')->nullable();
            $table->string('caption')->nullable();
            $table->text('description')->nullable();
            $table->text('alternative_text')->nullable();
            $table->string('file_name');
            $table->string('file_ext')->nullable();
            $table->string('file_dimension')->nullable();
            $table->integer('file_size')->default(0);
            $table->string('file_dir')->nullable()->index();
            $table->string('file_path');
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
        Schema::dropIfExists('files');
    }
};
