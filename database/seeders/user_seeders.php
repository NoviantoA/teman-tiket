<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class user_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User seeder
        $userRecords = [
          [
            'id' => 1,
            'role_id' => 1,
            'bank_id' => 0,
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('temantiketkita'),
            'no_telp' =>  '089237183912',
            'img_profile' => '',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          [
            'id' => 2,
            'role_id' => 2,
            'bank_id' => 0,
            'name' => 'Novianto Anggoro',
            'email' => 'novianto@gmail.com',
            'password' => Hash::make('12345'),
            'no_telp' =>  '08963919273912',
            'img_profile' => '',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          [
            'id' => 3,
            'role_id' => 2,
            'bank_id' => 0,
            'name' => 'Ahmad Yusuf Al Maruf',
            'email' => 'maruf@gmail.com',
            'password' => Hash::make('12345'),
            'no_telp' =>  '08963919273912',
            'img_profile' => '',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          [
            'id' => 4,
            'role_id' => 3,
            'bank_id' => 1,
            'name' => 'Dimas Mirza Alifansa',
            'email' => 'dimas@gmail.com',
            'password' => Hash::make('12345'),
            'no_telp' =>  '08963919273912',
            'img_profile' => '',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          [
            'id' => 6,
            'role_id' => 3,
            'bank_id' => 1,
            'name' => 'Noviantika Anggraini',
            'email' => 'noviantika@gmail.com',
            'password' => Hash::make('12345'),
            'no_telp' =>  '08963919273912',
            'img_profile' => '',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ],
          [
            'id' => 5,
            'role_id' => 4,
            'bank_id' => 0,
            'name' => 'Firman Perdana',
            'email' => 'firman@gmail.com',
            'password' => Hash::make('12345'),
            'no_telp' =>  '08963919273912',
            'img_profile' => '',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
          ]
          ];
          User::insert($userRecords);
    }
}