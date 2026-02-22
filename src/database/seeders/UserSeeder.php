<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    

public function run(): void
{
    $classes = SchoolClass::factory()->count(6)->create();

    User::factory()->admin()->create([
        'class_id' => null,
    ]);

    User::factory()->count(10)->teacher()->create([
        'class_id' => null,
    ]);

    User::factory()
        ->count(50)
        ->student()
        ->make()
        ->each(function ($user) use ($classes) {
            $user->class_id = $classes->random()->id;
            $user->save();
        });
}

}
