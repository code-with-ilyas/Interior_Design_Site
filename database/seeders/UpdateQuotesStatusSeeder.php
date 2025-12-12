<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateQuotesStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update all existing quotes to have the default 'pending' status
        DB::table('quotes')
            ->whereNull('status')
            ->update(['status' => 'pending']);
    }
}
