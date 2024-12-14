<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('storages')->insert([
            ['storage_size' => '128GB'],
            ['storage_size' => '256GB'],
            ['storage_size' => '512GB'],
            ['storage_size' => '1TB'],
        ]);
    }
}
