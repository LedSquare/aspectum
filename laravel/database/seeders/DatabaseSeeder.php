<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Domains\Aspect\database\seeders\MoodLevelSeeder;
use App\Domains\Aspect\database\seeders\Word\WordSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WordSeeder::class,
            MoodLevelSeeder::class,
        ]);
    }
}
