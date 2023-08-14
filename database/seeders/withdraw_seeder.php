<?php

namespace Database\Seeders;

use App\Models\Withdraws;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class withdraw_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Bank Seeders
        $withdrawRecord = [
            [
              'bank_id' => 1,
              'nominal' => "20000000",
              "status" => "proses",
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            [
              'bank_id' => 2,
              'nominal' => "10000000",
              "status" => "diajukan",
              'created_at'=>Carbon::now(),
              'updated_at'=>Carbon::now()
            ],
            ];
            Withdraws::insert($withdrawRecord);
    }
}