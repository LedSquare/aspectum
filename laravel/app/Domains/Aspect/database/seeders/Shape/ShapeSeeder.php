<?php

namespace App\Domains\Aspect\database\seeders\Shape;

use Aspect\Models\Stages\Shape\Shape;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cirle = 'circle';
        $triang = 'triang';

        for ($i = 1; $i <= 2; $i++) {
            Shape::create([
                'a_shape_category_id' => 1,
                'filepath' => "shapes/$cirle" . 's/' . $cirle . $i . '.png',
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            Shape::create([
                'a_shape_category_id' => 2,
                'filepath' => "shapes/$triang" . 's/' . $triang . $i . '.png',
            ]);
        }
    }
}
