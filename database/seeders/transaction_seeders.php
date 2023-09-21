<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Transactions;

class transaction_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trans = [];

        for ($i = 1; $i <= 6; $i++) {
            
            $qrCode = Str::random(32);    
            $qrCodeText = "Transaction ID: " . $i; 
            $qrCodePath = 'store/qrcode/transaction_' . $i . '.png'; 

            try {
                QrCode::size(300)->generate($qrCodeText, public_path($qrCodePath));
            } catch (\Exception $e) {
                // Log any exceptions or errors
                \Log::error('Gagal Generate QR Code Transaksi' . $i . ': ' . $e->getMessage());
            }

            $ticket_count = rand(1, 3);
            $ppn = rand(5000, 20000) * 0.11;
            $appService = 1000;
            $total_trans = ($appService * $ticket_count) * $ppn;

            $new_arr = [
                "transaction_id" => $i,
                "event_id" => $i,
                "ticket_id" => $i,
                "user_id" => rand(7, 8),
                "transaction_ticket_count" => $ticket_count,
                "transaction_ppn" => $ppn,
                "transaction_app_service" => $appService * $ticket_count,
                "transaction_total" => $total_trans,
                "transaction_is_paid" => rand(0, 1),
                "transaction_end_date" => Carbon::now()->addDays(3),
                'qr_code' => $qrCodePath, // Store the QR code path in the database
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            array_push($trans, $new_arr);
        }

        Transactions::insert($trans);
    }
}