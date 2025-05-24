<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Starting EventSeeder');

        $events = [
            [
                'title' => 'The Future of Technology in Education',
                'description' => 'Join our webinar to explore how technology is shaping the future of education. Guest speakers include industry leaders.',
                'event_date' => Carbon::parse('2025-03-15 14:00:00'),
            ],
            [
                'title' => 'Cybersecurity Workshop',
                'description' => 'A hands-on workshop on cybersecurity best practices, open to all students.',
                'event_date' => Carbon::parse('2025-06-10 10:00:00'),
            ],
            [
                'title' => 'Career Fair 2025',
                'description' => 'Meet top tech companies and explore internship and job opportunities.',
                'event_date' => Carbon::parse('2025-07-20 09:00:00'),
            ],
        ];

        try {
            foreach ($events as $event) {
                Event::updateOrCreate(
                    ['title' => $event['title']],
                    $event
                );
                Log::info('Seeded event: ' . $event['title']);
            }
            Log::info('EventSeeder completed successfully');
        } catch (\Exception $e) {
            Log::error('EventSeeder failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
