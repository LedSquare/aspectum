<?php

namespace App\Domains\Aspect\database\seeders\Word;

use App\Domains\Aspect\database\factories\Word\WordFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WordFactory::new()->count(10)->create();
    }
}
