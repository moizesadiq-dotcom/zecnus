<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Pehle users/admin create honge taake foreign key ka masla na aaye
        $this->call([
            AdminSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class, // Yeh baad me chalega
        ]);
    }
}