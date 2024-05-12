<?php

namespace App\Domains\Aspect\database\seeders;

use App\Domains\Aspect\database\factories\MoodLevelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoodLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MoodLevelFactory::new()->count(10)->create();
    }
}
