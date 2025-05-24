<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resource;
use App\Models\Course;
use Illuminate\Support\Facades\Log;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Starting ResourceSeeder');

        $resources = [
            [
                'name' => 'Advanced Machine Learning',
                'code' => 'ML201',
                'file_path' => 'resources/Advanced_Machine_Learning.pdf',
                'file_type' => 'pdf',
                'file_size' => 5.2,
            ],
            [
                'name' => 'Introduction to Web Development',
                'code' => 'CS101',
                'file_path' => 'resources/Introduction_to_Web_Development.pdf',
                'file_type' => 'pdf',
                'file_size' => 3.8,
            ],
            [
                'name' => 'Data Structures Tutorial',
                'code' => 'CS104',
                'file_path' => 'resources/Data_Structures_Tutorial.mp4',
                'file_type' => 'mp4',
                'file_size' => 120.5,
            ],
            [
                'name' => 'Cyber Security Basics',
                'code' => 'CS103',
                'file_path' => 'resources/Cyber_Security_Basics.pdf',
                'file_type' => 'pdf',
                'file_size' => 4.1,
            ],
            [
                'name' => 'Python Django Overview',
                'code' => 'CS108-4',
                'file_path' => 'resources/Python_Django_Overview.mp4',
                'file_type' => 'mp4',
                'file_size' => 85.3,
            ],
            [
                'name' => 'Frontend Development Guide',
                'code' => 'CS126',
                'file_path' => 'resources/Frontend_Development_Guide.pdf',
                'file_type' => 'pdf',
                'file_size' => 6.7,
            ],
        ];

        try {
            foreach ($resources as $resource) {
                $course = Course::where('code', $resource['code'])->first();
                if ($course) {
                    Resource::updateOrCreate(
                        [
                            'course_id' => $course->id,
                            'name' => $resource['name'],
                        ],
                        [
                            'course_id' => $course->id,
                            'name' => $resource['name'],
                            'file_path' => $resource['file_path'],
                            'file_type' => $resource['file_type'],
                            'file_size' => $resource['file_size'],
                        ]
                    );
                    Log::info('Seeded resource: ' . $resource['name']);
                } else {
                    Log::warning('Course not found for code: ' . $resource['code']);
                }
            }
            Log::info('ResourceSeeder completed successfully');
        } catch (\Exception $e) {
            Log::error('ResourceSeeder failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
