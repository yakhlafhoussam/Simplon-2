<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'first' => $this->faker->firstName(),
            'last'  => $this->faker->lastName(),
            'role'  => $this->faker->randomElement(['teacher', 'student', 'admin']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->boolean(80) ? now() : null,
            'password' => Hash::make('password'),
        ];
    }

    /* ---------- STATES ---------- */

    public function teacher()
    {
        return $this->state(fn () => [
            'role' => 'teacher',
        ]);
    }

    public function student()
    {
        return $this->state(fn () => [
            'role' => 'student',
        ]);
    }

    public function admin()
    {
        return $this->state(fn () => [
            'role' => 'admin',
        ]);
    }
}
