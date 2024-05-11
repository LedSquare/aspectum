<?php

namespace App\Domains\Aspect\database\factories;

use Aspect\Models\Stage\MoodLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<MoodLevel>
 */
class MoodLevelFactory extends Factory
{
    /**
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = MoodLevel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
