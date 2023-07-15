<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
          [
            'id' => 1,
            'name' => 'Super Admin',
            'type' => 'superadmin',
            'vendor_id' => 0,
            'mobile' =>  '089237183912',
            'email' => 'admin@admin.com',
            'password' => Hash::make('temantiketkita'),
            'image' => '',
            'status' => 1
          ],
          [
            'id' => 2,
            'name' => 'Novianto Anggoro',
            'type' => 'vendor',
            'vendor_id' => 1,
            'mobile' =>  '08963919273912',
            'email' => 'novianto@gmail.com',
            'password' => Hash::make('12345'),
            'image' => '',
            'status' => 0
          ]
        ];
        Admin::insert($adminRecords);
    }
}