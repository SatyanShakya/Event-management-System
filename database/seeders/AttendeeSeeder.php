<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attendee;
use App\Models\Event;

class AttendeeSeeder extends Seeder
{

    public function run(): void
    {

        $attendees = [
            ['name' => 'Attendee 1', 'email' => 'attendee1@gmail.com', 'event_id' => 1],
            ['name' => 'Attendee 2', 'email' => 'attendee2@gmail.com', 'event_id' => 1],
            ['name' => 'Attendee 3', 'email' => 'attendee3@gmail.com', 'event_id' => 2],
        ];

        foreach ($attendees as $attendee) {
            Attendee::create($attendee);
        }
    }
}
