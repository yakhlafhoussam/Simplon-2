<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sprint;

class SprintSeeder extends Seeder
{
    public function run(): void
    {
        $sprints = [
            [
                'name' => 'HTML & CSS',
                'start_date' => '2026-02-03',
                'end_date' => '2026-02-14',
            ],
            [
                'name' => 'JavaScript',
                'start_date' => '2026-02-17',
                'end_date' => '2026-02-28',
            ],
            [
                'name' => 'PHP Fundamentals',
                'start_date' => '2026-03-03',
                'end_date' => '2026-03-14',
            ],
            [
                'name' => 'Laravel Backend',
                'start_date' => '2026-03-17',
                'end_date' => '2026-03-28',
            ],
            [
                'name' => 'Database Design (MySQL)',
                'start_date' => '2026-03-31',
                'end_date' => '2026-04-11',
            ],
            [
                'name' => 'Vue.js Frontend',
                'start_date' => '2026-04-14',
                'end_date' => '2026-04-25',
            ],
            [
                'name' => 'API Integration',
                'start_date' => '2026-04-28',
                'end_date' => '2026-05-09',
            ],
            [
                'name' => 'Testing & Deployment',
                'start_date' => '2026-05-12',
                'end_date' => '2026-05-23',
            ],
        ];

        foreach ($sprints as $sprint) {
            Sprint::create($sprint);
        }
    }
}