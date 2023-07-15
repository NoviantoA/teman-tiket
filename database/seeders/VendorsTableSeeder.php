<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords = [
            [
                'id' => 1,
                'name' => "Novianto Anggoro",
                'address' => 'Jl. Melati Desa Kedungsari',
                'city' => 'Tuban',
                'province' => 'Jawa Timur',
                'country' => 'Indonesia',
                'pincode' => '62353',
                'mobile' => '08963919273912',
                'email' => 'novianto@gmail.com',
                'status' => 0
            ],
        ];
        Vendor::insert($vendorRecords);
    }
}
