<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create classes
        $grade10 = Classes::create(['name' => 'Grade 10']);
        $grade11 = Classes::create(['name' => 'Grade 11']);
        $grade12 = Classes::create(['name' => 'Grade 12']);

        // Create sections
        $grade10SectionA = Section::create(['class_id' => $grade10->id, 'name' => 'Section A']);
        $grade10SectionB = Section::create(['class_id' => $grade10->id, 'name' => 'Section B']);
        $grade11SectionA = Section::create(['class_id' => $grade11->id, 'name' => 'Section A']);
        $grade12SectionA = Section::create(['class_id' => $grade12->id, 'name' => 'Section A']);

        // Create students
        Student::create([
            'class_id' => $grade10->id,
            'section_id' => $grade10SectionA->id,
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        Student::create([
            'class_id' => $grade10->id,
            'section_id' => $grade10SectionA->id,
            'name' => 'Jane Smith',
            'email' => 'jane@example.com'
        ]);

        Student::create([
            'class_id' => $grade11->id,
            'section_id' => $grade11SectionA->id,
            'name' => 'Bob Wilson',
            'email' => 'bob@example.com'
        ]);

        Student::create([
            'class_id' => $grade12->id,
            'section_id' => $grade12SectionA->id,
            'name' => 'Alice Brown',
            'email' => 'alice@example.com'
        ]);
    }
}
