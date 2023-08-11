<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banks;
use Carbon\Carbon;

class bank_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Bank Seeders
        $bankRecords = [
            [
              'bank_id' => 1,
              'user_id' => 4,
              'bank_type' => "Bank",
              'bank_nomer_hp' => null,
              'bank_nomer_rekening' => "675982639832567",
              'bank_name' => "Bank Central Asia",
              'bank_name_user' => "Dimas Mirza Alifansa",
              'bank_is_verified' => 0,
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            [
              'bank_id' => 2,
              'user_id' => 6,
              'bank_type' => "Bank",
              'bank_nomer_hp' => null,
              'bank_nomer_rekening' => "9837498237987",
              'bank_name' => "Bank Mandiri",
              'bank_name_user' => "Noviantika Anggraini",
              'bank_is_verified' => 0,
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            [
              'bank_id' => 3,
              'user_id' => 6,
              'bank_type' => "Bank",
              'bank_nomer_hp' => null,
              'bank_nomer_rekening' => "98648197241",
              'bank_name' => "Bank Syariah",
              'bank_name_user' => "Noviantika Anggraini",
              'bank_is_verified' => 0,
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            ];
            Banks::insert($bankRecords);
    }
}