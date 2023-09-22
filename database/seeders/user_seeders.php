<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                // 'id' => 1,
                'role_id' => 1,
                'bank_id' => 0,
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('temantiketkita'),
                'no_telp' => '089237183912',
                'img_profile' => '',
                'gender' => "Male",
                'address' => "Jl Tunjungan No 100, Surabaya, Jawa Timur",
                'born_date' => Carbon::create(2002, 1, 31, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => 2,
                'role_id' => 2,
                'bank_id' => 0,
                'name' => 'Novianto Anggoro',
                'email' => 'novianto@gmail.com',
                'password' => Hash::make('12345'),
                'no_telp' => '08963919273912',
                'img_profile' => '',
                'gender' => "Male",
                'address' => "Jl Tunjungan No 100, Surabaya, Jawa Timur",
                'born_date' => Carbon::create(2002, 1, 31, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => 3,
                'role_id' => 2,
                'bank_id' => 0,
                'name' => 'Ahmad Yusuf Al Maruf',
                'email' => 'maruf@gmail.com',
                'password' => Hash::make('12345'),
                'no_telp' => '08963919273912',
                'img_profile' => '',
                'gender' => "Male",
                'address' => "Jl Tunjungan No 100, Surabaya, Jawa Timur",
                'born_date' => Carbon::create(2002, 1, 31, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => 4,
                'role_id' => 3,
                'bank_id' => 1,
                'name' => 'Dimas Mirza Alifansa',
                'email' => 'dimas@gmail.com',
                'password' => Hash::make('12345'),
                'no_telp' => '08963919273912',
                'img_profile' => '',
                'gender' => "Male",
                'address' => "Jl Tunjungan No 100, Surabaya, Jawa Timur",
                'born_date' => Carbon::create(2002, 1, 31, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => 6,
                'role_id' => 3,
                'bank_id' => 0,
                'name' => 'Firman Perdana',
                'email' => 'firman@gmail.com',
                'password' => Hash::make('12345'),
                'no_telp' => '08963919273912',
                'img_profile' => '',
                'gender' => "Male",
                'address' => "Jl Tunjungan No 100, Surabaya, Jawa Timur",
                'born_date' => Carbon::create(2002, 1, 31, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => 7,
                'role_id' => 3,
                'bank_id' => 0,
                'name' => 'Venira Citra',
                'email' => 'venira@gmail.com',
                'password' => Hash::make('12345'),
                'no_telp' => '08963919273912',
                'img_profile' => '',
                'gender' => "Female",
                'address' => "Jl Tunjungan No 100, Surabaya, Jawa Timur",
                'born_date' => Carbon::create(2002, 1, 31, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => 8,
                'role_id' => 4,
                'bank_id' => 0,
                'name' => 'Royan Sultoni',
                'email' => 'royan@gmail.com',
                'password' => Hash::make('12345'),
                'no_telp' => '08963919273912',
                'img_profile' => '',
                'gender' => "Male",
                'address' => "Jl Tunjungan No 100, Surabaya, Jawa Timur",
                'born_date' => Carbon::create(2002, 1, 31, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 'id' => 9,
                'role_id' => 4,
                'bank_id' => 0,
                'name' => 'Gede Ardi',
                'email' => 'ardi@gmail.com',
                'password' => Hash::make('12345'),
                'no_telp' => '08963919273912',
                'img_profile' => '',
                'gender' => "Male",
                'address' => "Jl Tunjungan No 100, Surabaya, Jawa Timur",
                'born_date' => Carbon::create(2002, 1, 31, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        User::insert($userRecords);
    }
}
