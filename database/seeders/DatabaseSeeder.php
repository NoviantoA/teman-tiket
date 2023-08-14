<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(user_seeders::class);
        $this->call(role_seeders::class);
        $this->call(event_seeders::class);
        $this->call(bank_seeders::class);
        $this->call(ticket_seeder::class);
<<<<<<< HEAD
        $this->call(withdraw_seeder::class);
=======
        $this->call(transaction_seeders::class);
        $this->call(ticket_user_seeders::class);
>>>>>>> 87eef8923718d79d92fcfc527c4f58d0ba532527
    }
}