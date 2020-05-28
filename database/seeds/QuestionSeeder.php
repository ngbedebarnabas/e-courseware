<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'course_title' => 'Intro to Management Science',
            'faculty_id' => 1,
            'department_id' =>1,
            'front' => 'Front Page',
            'back' => 'Back Page',
            'pdf' => 'pdf'
        ]);

        Question::create([
            'course_title' => 'Intro to Science',
            'faculty_id' => 2,
            'department_id' =>2,
            'front' => 'Front Page',
            'back' => 'Back Page',
            'pdf' => 'pdf'
        ]);

        Question::create([
            'course_title' => 'Intro to Art',
            'faculty_id' => 3,
            'department_id' =>3,
            'front' => 'Front Page',
            'back' => 'Back Page',
            'pdf' => 'pdf'
        ]);

        Question::create([
            'course_title' => 'Intro to Social Science',
            'faculty_id' => 4,
            'department_id' =>4,
            'front' => 'Front Page',
            'back' => 'Back Page',
            'pdf' => 'pdf'
        ]);

        Question::create([
            'course_title' => 'Intro to Environmental science',
            'faculty_id' => 5,
            'department_id' =>5,
            'front' => 'Front Page',
            'back' => 'Back Page',
            'pdf' => 'pdf'
        ]);

        Question::create([
            'course_title' => 'Intro to Business',
            'faculty_id' => 6,
            'department_id' =>6,
            'front' => 'Front Page',
            'back' => 'Back Page',
            'pdf' => 'pdf'
        ]);

        Question::create([
            'course_title' => 'Intro to Law',
            'faculty_id' => 7,
            'department_id' =>7,
            'front' => 'Front Page',
            'back' => 'Back Page',
            'pdf' => 'pdf'
        ]);

        Question::create([
            'course_title' => 'Intro to Art',
            'faculty_id' => 3,
            'department_id' =>8,
            'front' => 'Front Page',
            'back' => 'Back Page',
            'pdf' => 'pdf'
        ]);
    }
}
