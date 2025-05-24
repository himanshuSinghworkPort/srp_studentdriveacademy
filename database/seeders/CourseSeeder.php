<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['name' => 'One Month INDUSTRIAL TRAINING WEB DESIGNING', 'code' => 'CS101', 'duration' => 'One Month', 'extra_buttons' => true],
            ['name' => 'One Month INDUSTRIAL TRAINING COMPUTER HARDWARE & NETWORKING', 'code' => 'CS102', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING CYBER SECURITY', 'code' => 'CS103', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING JAVA J2SE', 'code' => 'CS104', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING JAVA J2EE', 'code' => 'CS105', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING ANDROID DEVELOPMENT', 'code' => 'CS106', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING PYTHON BASIC', 'code' => 'CS107', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING PYTHON DJANGO', 'code' => 'CS108', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING HTML CSS JAVASCRIPT', 'code' => 'CS109', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING PHP', 'code' => 'CS110', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING C', 'code' => 'CS111', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING EMBEDDED C', 'code' => 'CS112', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING ARDUINO', 'code' => 'CS113', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING REACT JS', 'code' => 'CS114', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING NODE JS', 'code' => 'CS115', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING ANGULAR JS', 'code' => 'CS116', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING BOOTSTRAP', 'code' => 'CS117', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING LARAVEL PHP', 'code' => 'CS118', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING SWING JAVA', 'code' => 'CS119', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING JDBC', 'code' => 'CS120', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING NETWORKING', 'code' => 'CS121', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING MYSQL', 'code' => 'CS122', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING MS WORD', 'code' => 'CS123', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING MS EXCEL', 'code' => 'CS124', 'duration' => 'One Month'],
            ['name' => 'One Month INDUSTRIAL TRAINING CHAT GPT', 'code' => 'CS125', 'duration' => 'One Month'],
            ['name' => '04 Month TRAINING WEB DESIGNING', 'code' => 'CS101', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING COMPUTER HARDWARE & NETWORKING', 'code' => 'CS102', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING CYBER SECURITY', 'code' => 'CS103', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING JAVA J2SE', 'code' => 'CS104', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING JAVA J2EE', 'code' => 'CS105', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING ANDROID DEVELOPMENT', 'code' => 'CS106', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING PYTHON BASIC', 'code' => 'CS107', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING PYTHON DJANGO', 'code' => 'CS108', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING HTML CSS JAVASCRIPT', 'code' => 'CS109', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING PHP', 'code' => 'CS110', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING C', 'code' => 'CS111', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING EMBEDDED C', 'code' => 'CS112', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING ARDUINO', 'code' => 'CS113', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING REACT JS', 'code' => 'CS114', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING NODE JS', 'code' => 'CS115', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING ANGULAR JS', 'code' => 'CS116', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING BOOTSTRAP', 'code' => 'CS117', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING LARAVEL PHP', 'code' => 'CS118', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING SWING JAVA', 'code' => 'CS119', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING JDBC', 'code' => 'CS120', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING NETWORKING', 'code' => 'CS121', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING MYSQL', 'code' => 'CS122', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING MS WORD', 'code' => 'CS123', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING MS EXCEL', 'code' => 'CS124', 'duration' => '04 Month'],
            ['name' => '04 Month TRAINING CHAT GPT', 'code' => 'CS125', 'duration' => '04 Month'],
            ['name' => '06 Month FRONT END DEVELOPMENT TRAINING', 'code' => 'CS126', 'duration' => '06 Month'],
            ['name' => '06 Month BACKEND DEVELOPMENT TRAINING', 'code' => 'CS127', 'duration' => '06 Month'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
