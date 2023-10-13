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
        Schema::table('visa_application', function (Blueprint $table) {
            $table->string('square_payment_id')->nullable();
            $table->dateTime('square_payment_complete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visa_application', function (Blueprint $table) {
            $table->dropColumn('square_payment_id')->nullable();
            $table->dropColumn('square_payment_complete_at')->nullable();
        });
    }
};
