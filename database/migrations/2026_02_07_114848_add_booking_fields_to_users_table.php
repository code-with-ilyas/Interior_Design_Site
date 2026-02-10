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
        Schema::table('users', function (Blueprint $table) {
            $table->string('timezone')->default('UTC');
            $table->time('working_hours_start')->default('09:00:00');
            $table->time('working_hours_end')->default('17:00:00');
            $table->string('working_days')->default('1,2,3,4,5'); // Mon-Fri
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['timezone', 'working_hours_start', 'working_hours_end', 'working_days']);
        });
    }
};
