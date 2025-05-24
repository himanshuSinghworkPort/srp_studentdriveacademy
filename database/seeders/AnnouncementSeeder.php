<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;
use Illuminate\Support\Facades\Log;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Starting AnnouncementSeeder');

        $announcements = [
            [
                'title' => 'New Course Offerings',
                'description' => 'We are excited to announce new courses for the upcoming semester, including Advanced AI and Cloud Computing. Enroll now!',
                'created_at' => now()->subDays(2),
            ],
            [
                'title' => 'System Maintenance',
                'description' => 'The academic portal will undergo scheduled maintenance on May 25, 2025, from 1:00 AM to 3:00 AM IST. Expect temporary downtime.',
                'created_at' => now()->subDay(),
            ],
            [
                'title' => 'Guest Lecture Series',
                'description' => 'Join our guest lecture series featuring industry experts in Web Development and Cybersecurity, starting June 1, 2025.',
                'created_at' => now(),
            ],
        ];

        try {
            foreach ($announcements as $announcement) {
                Announcement::updateOrCreate(
                    ['title' => $announcement['title']],
                    $announcement
                );
                Log::info('Seeded announcement: ' . $announcement['title']);
            }
            Log::info('AnnouncementSeeder completed successfully');
        } catch (\Exception $e) {
            Log::error('AnnouncementSeeder failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
