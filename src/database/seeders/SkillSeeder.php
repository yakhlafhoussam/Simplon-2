<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $competences = [
            [
                'title' => 'HTML',
                'desc' => 'Structure web pages using semantic HTML elements and accessibility best practices.',
            ],
            [
                'title' => 'CSS',
                'desc' => 'Style responsive layouts using Flexbox, Grid, and modern CSS techniques.',
            ],
            [
                'title' => 'JavaScript',
                'desc' => 'Develop dynamic and interactive user interfaces using modern JavaScript (ES6+).',
            ],
            [
                'title' => 'PHP',
                'desc' => 'Build server-side logic and handle backend operations using PHP.',
            ],
            [
                'title' => 'Laravel',
                'desc' => 'Develop scalable web applications using Laravel MVC architecture and REST APIs.',
            ],
            [
                'title' => 'MySQL',
                'desc' => 'Design relational databases and write optimized SQL queries.',
            ],
            [
                'title' => 'Vue.js',
                'desc' => 'Create reactive frontend applications using Vue.js components and state management.',
            ],
            [
                'title' => 'Docker',
                'desc' => 'Containerize applications to ensure consistent development and deployment environments.',
            ],
            [
                'title' => 'Git',
                'desc' => 'Manage source code versioning and collaboration using Git workflows.',
            ],
            [
                'title' => 'Agile Scrum',
                'desc' => 'Work efficiently in iterative development cycles using Agile Scrum methodology.',
            ],
        ];

        foreach ($competences as $competence) {
            Skill::create($competence);
        }
    }
}