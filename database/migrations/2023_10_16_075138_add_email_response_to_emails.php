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
        Schema::table('emails', function (Blueprint $table) {
            $table->string('reference_class')->nullable();
            $table->string('reference_key')->nullable();
            $table->string('email_to')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->text('email_response')->nullable();
            $table->longText('email_data')->nullable();
        });
        Schema::table('email_templates', function (Blueprint $table) {
            $table->string('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emails', function (Blueprint $table) {
            $table->dropColumn('reference_class');
            $table->dropColumn('reference_key');
            $table->dropColumn('email_to');
            $table->dropColumn('sent_at');
            $table->dropColumn('email_response');
            $table->dropColumn('email_data');
        });
        Schema::table('email_templates', function (Blueprint $table) {
            $table->dropColumn('name')->nullable();
        });
    }
};
