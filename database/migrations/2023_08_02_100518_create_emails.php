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
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('email_title')->nullable();
            $table->string('email_from')->nullable();
            $table->string('status')->default('active');
            $table->string('email_cc')->nullable();
            $table->string('email_bcc')->nullable();
            $table->string('email_reply_to')->nullable();
            $table->longText('email_content')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->integer('template_id')->nullable();
            $table->string('status')->default('waiting');
            $table->string('email_title')->nullable();
            $table->string('email_reply_to')->nullable();
            $table->string('email_cc')->nullable();
            $table->string('email_bcc')->nullable();
            $table->longText('email_content')->nullable();
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
        Schema::dropIfExists('email_templates');
        Schema::dropIfExists('emails');
    }
};
