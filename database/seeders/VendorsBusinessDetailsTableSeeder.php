<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetails;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords = [
            [
                'id' => 1,
                'vendor_id' => 1,
                'shop_name' => 'Pesan Tiket Store',
                'shop_address' => 'Jl. Melati Desa Kedungsari',
                'shop_city' => 'Tuban',
                'shop_province' => 'Jawa Timur',
                'shop_country' => 'Indonesia',
                'shop_pincode' => '62353',
                'shop_mobile' => '0893812791241',
                'shop_email' => 'pesantiket@gmail.com',
                'address_proof' => 'Passport',
                'address_proof_image' => 'test.jpg',
                'business_license_number' => '123456789',
                'gst_number' => '63192791',
                'pan_number' => '1223407234'
            ]
            ];
            VendorsBusinessDetails::insert($vendorRecords);
    }
}