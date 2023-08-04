<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Events;
use Carbon\Carbon;


class event_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
   {
    //Event seeders
    $events = [];
    for ($i=1; $i <= 20 ; $i++) { 
        $new_arr = [
        'event_id' => $i,
        'user_id' => rand(4,6),
        'transaction_id' => 0,
        'wishlist_id' => 0,
        'talent_id' => 0,
        'event_price'=>20000,
        'event_name' => "Webinar LPPM $i",
        'event_location' => "LPPM UPN Veteran Jawa Timur",
        'event_date' => Carbon::now(),
        'event_city' => "Surabaya",
        'event_poster' => "surabaya.png",
        'event_description' => "Webinar bagus banget ini",
        'event_tag' => "Webinar",
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now()
        ];
        array_push($events, $new_arr);
    };

    Events::insert($events);
   }
}
