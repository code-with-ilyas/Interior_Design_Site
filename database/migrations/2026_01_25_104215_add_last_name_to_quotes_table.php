<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add the last_name column after first_name
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('last_name')->after('first_name');
        });

        // Copy the existing name values to last_name
        DB::table('quotes')->update(['last_name' => DB::raw('name')]);

        // Drop the old name column
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back the name column before first_name
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('name')->before('first_name');
        });

        // Copy the last_name values back to name
        DB::table('quotes')->update(['name' => DB::raw('last_name')]);

        // Drop the last_name column
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('last_name');
        });
    }
};
