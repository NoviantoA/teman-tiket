<?php

namespace Database\Seeders;

use App\Models\Wishlists;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class wishlist_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Ticket seeders
        $wishlists = [];
        for ($i = 1; $i <= 20; $i++) {
            $new_arr = [
                "wishlist_id" => $i,
                "user_id" => rand(7, 8),
                "event_id" => rand(1, 20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            array_push($wishlists, $new_arr);
        };

        Wishlists::insert($wishlists);
    }
}
