<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classe>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = SchoolClass::class;


    public function definition(): array
    {
        return [
            'name' => 'Class ' . $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'school_year' => $this->faker->numberBetween(1, 6),
        ];
    }
}
