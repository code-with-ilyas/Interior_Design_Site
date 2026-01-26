<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the table exists before dropping it
        if (Schema::hasTable('abouts')) {
            Schema::dropIfExists('abouts');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don't recreate the table since we want it permanently removed
        // This makes the migration effectively irreversible in terms of the table
    }
};
