<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetails;

class VendorsBankDetailsTableSeeder extends Seeder
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
                'account_holder_name' => 'Novianto Anggoro',
                'bank_name' => 'BRI',
                'account_number' => '7219301202012034',
                'bank_ifsc_code' => '12793102'
            ]
        ];
        VendorsBankDetails::insert($vendorRecords);
    }
}