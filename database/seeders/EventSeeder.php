<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Category;

class EventSeeder extends Seeder
{

    public function run(): void
    {
        $categoryIds = Category::pluck('id');

        for ($i = 1; $i <= 5; $i++) {
            Event::create([
                'title' => 'Event ' . $i,
                'description' => 'Description of event ' . $i,
                'date' => now()->addDays($i),
                'location' => 'Location ' . $i,
                'category_id' => $categoryIds->random(),
            ]);
        }
    }
}
