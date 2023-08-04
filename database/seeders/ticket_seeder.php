<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tickets;
use Carbon\Carbon;

class ticket_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Ticket seeders
        $tickets = [];
        for ($i=1; $i <= 20 ; $i++) { 
            $new_arr = [
                "ticket_id" => $i,
                "event_id" => $i,
                "ticket_name" => "Ticket Webinar $i",
                "ticket_capacity" => rand(51,233),
                "ticket_sold" => rand(1,65),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ];
            array_push($tickets, $new_arr);
        };

        Tickets::insert($tickets);
    }
}
