<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //testing seeders
        if (app()->environment('staging') || app()->environment('local')) {
            $this->call(UserSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(ProductSeeder::class);
        }
    }
}
