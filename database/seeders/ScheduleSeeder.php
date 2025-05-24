<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Course;
use Illuminate\Support\Facades\Log;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Starting ScheduleSeeder');

        $schedules = [
            ['name' => 'One Month INDUSTRIAL TRAINING WEB DESIGNING', 'code' => 'CS101', 'timing' => '12:30PM-2:00PM', 'highlight' => true],
            ['name' => 'One Month INDUSTRIAL TRAINING COMPUTER HARDWARE & NETWORKING', 'code' => 'CS102', 'timing' => '10:30AM-12:00PM', 'highlight' => true],
            ['name' => 'One Month INDUSTRIAL TRAINING CYBER SECURITY', 'code' => 'CS103', 'timing' => '10:30PM-11:30PM', 'highlight' => true],
            ['name' => 'One Month INDUSTRIAL TRAINING JAVA J2SE', 'code' => 'CS104', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING JAVA J2EE', 'code' => 'CS105', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING ANDROID DEVELOPMENT', 'code' => 'CS106', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING PYTHON BASIC', 'code' => 'CS107', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING PYTHON DJANGO', 'code' => 'CS108', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING HTML CSS JAVASCRIPT', 'code' => 'CS109', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING PHP', 'code' => 'CS110', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING C', 'code' => 'CS111', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING EMBEDDED C', 'code' => 'CS112', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING ARDUINO', 'code' => 'CS113', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING REACT JS', 'code' => 'CS114', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING NODE JS', 'code' => 'CS115', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING ANGULAR JS', 'code' => 'CS116', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING BOOTSTRAP', 'code' => 'CS117', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING LARAVEL PHP', 'code' => 'CS118', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING SWING JAVA', 'code' => 'CS119', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING JDBC', 'code' => 'CS120', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING NETWORKING', 'code' => 'CS121', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING MYSQL', 'code' => 'CS122', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING MS WORD', 'code' => 'CS123', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING MS EXCEL', 'code' => 'CS124', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => 'One Month INDUSTRIAL TRAINING CHAT GPT', 'code' => 'CS125', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING WEB DESIGNING', 'code' => 'CS101-4', 'timing' => '09:00AM-10:00AM', 'highlight' => true],
            ['name' => '04 Month TRAINING COMPUTER HARDWARE & NETWORKING', 'code' => 'CS102-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING CYBER SECURITY', 'code' => 'CS103-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING JAVA J2SE', 'code' => 'CS104-4', 'timing' => '2:30PM-5:00PM', 'highlight' => true],
            ['name' => '04 Month TRAINING JAVA J2EE', 'code' => 'CS105-4', 'timing' => '2:30PM-5:00PM', 'highlight' => true],
            ['name' => '04 Month TRAINING ANDROID DEVELOPMENT', 'code' => 'CS106-4', 'timing' => '2:30PM-5:00PM', 'highlight' => true],
            ['name' => '04 Month TRAINING PYTHON BASIC', 'code' => 'CS107-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING PYTHON DJANGO', 'code' => 'CS108-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING HTML CSS JAVASCRIPT', 'code' => 'CS109-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING PHP', 'code' => 'CS110-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING C', 'code' => 'CS111-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING EMBEDDED C', 'code' => 'CS112-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING ARDUINO', 'code' => 'CS113-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING REACT JS', 'code' => 'CS114-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING NODE JS', 'code' => 'CS115-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING ANGULAR JS', 'code' => 'CS116-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING BOOTSTRAP', 'code' => 'CS117-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING LARAVEL PHP', 'code' => 'CS118-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING SWING JAVA', 'code' => 'CS119-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING JDBC', 'code' => 'CS120-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING NETWORKING', 'code' => 'CS121-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING MYSQL', 'code' => 'CS122-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING MS WORD', 'code' => 'CS123-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING MS EXCEL', 'code' => 'CS124-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '04 Month TRAINING CHAT GPT', 'code' => 'CS125-4', 'timing' => '--/--/----', 'highlight' => false],
            ['name' => '06 Month FRONT END DEVELOPMENT TRAINING', 'code' => 'CS126', 'timing' => '09:00AM-10:00AM', 'highlight' => true],
            ['name' => '06 Month BACKEND DEVELOPMENT TRAINING', 'code' => 'CS127', 'timing' => '09:00AM-10:00AM', 'highlight' => true],
        ];

        try {
            foreach ($schedules as $schedule) {
                $course = Course::where('code', $schedule['code'])->first();
                if ($course) {
                    Schedule::updateOrCreate(
                        ['course_id' => $course->id],
                        [
                            'course_id' => $course->id,
                            'timing' => $schedule['timing'],
                            'highlight' => $schedule['highlight'],
                        ]
                    );
                    Log::info('Seeded schedule for course: ' . $schedule['name']);
                } else {
                    Log::warning('Course not found for code: ' . $schedule['code']);
                }
            }
            Log::info('ScheduleSeeder completed successfully');
        } catch (\Exception $e) {
            Log::error('ScheduleSeeder failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
