<?php

namespace Database\Seeders;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class event_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Event seeders
        $events = [];
        for ($i = 1; $i <= 20; $i++) {
            $randNum = rand(9, 18);

            $new_arr = [
                'event_id' => $i,
                'user_id' => rand(4, 6),
                'talent_id' => 0,
                'event_price' => 20000,
                'event_name' => "Webinar LPPM $i",
                'event_location' => "LPPM UPN Veteran Jawa Timur",
                'event_date' => Carbon::now(),
                'event_city' => "Surabaya",
                'event_poster' => "S__{$randNum}.jpg",
                'event_description' => "Webinar bagus banget ini",
                'event_tag' => "Webinar",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            array_push($events, $new_arr);
        };

        Events::insert($events);
    }
}
