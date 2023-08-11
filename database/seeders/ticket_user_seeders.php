<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TicketUsers;
use Carbon\Carbon;

class ticket_user_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Ticket User Seeders
        $ticketUser = [];
        for ($i=1; $i <= 16 ; $i++) { 
            $ticket_count = rand(1,3);
            $ppn = rand(5000,2000) * 0.11;
            $appService = 1000;
            $total_trans = $appService * $ticket_count * $ppn;

            $new_arr = [
                "ticket_user_id" => $i,
                "transaction_id" => rand(1,6),
                "ticket_user_email" => "ticketuser{$i}@gmail.com",
                "ticket_user_name" => "ticketuser{$i}",
                "ticket_user_phone" => "0821521751882${i}",
                "ticket_user_bdate" =>Carbon::now()->year(2002)->month(rand(1,12))->day(rand(1,12)),
                "ticket_user_gender" => "Male",
                "ticket_user_address" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, nobis repellat fugiat sequi ad explicabo aut   repudiandae, eveniet doloremque odit placeat excepturi? Odio?",
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ];
            array_push($ticketUser, $new_arr);
        };
        TicketUsers::insert($ticketUser);
    }
}
