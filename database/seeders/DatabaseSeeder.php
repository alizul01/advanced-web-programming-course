<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NewsSeeder::class,
            ProductsSeeder::class,
            ProgramSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ali',
            'email' => 'ali@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
