<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tickets;
use App\Models\TicketUsers;
use App\Models\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Midtrans\Config;
use Midtrans\Snap;

class TicketTransactionController extends Controller
{
    //For ticket transaction
    public function index()
    {
        // Get Session From Detail Page
        if (!Session::get("create_transaction_msg")) {
            return back();
        }

        // Get data transactions
        $data_transactions = Session::get("data_transactions");

        // Get Ticket
        $ticket = Tickets::leftjoin("events", "events.event_id", "=", "tickets.event_id")
            ->leftjoin("users", "users.id", "=", "user_id")
            ->where("tickets.ticket_id", $data_transactions["ticket_id"])
            ->first();

        return view(
            'pages.user.pages.transactions.checkout',
            compact(
                "data_transactions",
                "ticket"
            )
        );
    }

    public function indexPayment()
    {

        return view(
            'pages.user.pages.transactions.payment',
        );
    }

    public function checkoutHandler(Request $request)
    {
        // dd($request->all());

        // Manual Validation
        $err = [];

        $ticketCount = (int) $request->ticket_count + 1;
        for ($i = 1; $i < $ticketCount; $i++) {
            // Email
            if ($request->has("input_email_{$i}")) {
                if ($request->input("input_email_{$i}") == null) {
                    array_push($err, "Email User Ticket {$i} is Required!");
                }
                if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $request->input("input_email_{$i}"))) {
                    array_push($err, "Email Type User Ticket {$i} is Invalid!");
                }
            }
            // Name
            if ($request->has("input_name_{$i}")) {
                if ($request->input("input_name_{$i}") == null) {
                    array_push($err, "Name of User Ticket {$i} is Required!");
                }
            }
            if (!preg_match('/^[A-Za-z\\s]+$/', $request->input("input_name_{$i}"))) {
                array_push($err, "Name Type of User Ticket {$i} is Invalid!");
            }
            // Phone
            if ($request->has("input_phone_{$i}")) {
                if ($request->input("input_phone_{$i}") == null) {
                    array_push($err, "Phone Number of User Ticket {$i} is Required!");
                }
                if (!preg_match('/^[0-9]+$/', $request->input("input_phone_{$i}"))) {
                    array_push($err, "Phone Number of User Ticket {$i} is Invalid!");
                }
            }
            // Bord Date
            if ($request->has("input_date_{$i}")) {
                if ($request->input("input_date_{$i}") == null) {
                    array_push($err, "Born Date of User Ticket {$i} is Required!");
                }
            }
            // Gender
            if ($request->has("input_gender_{$i}")) {
                if ($request->input("input_gender_{$i}") == null) {
                    array_push($err, "Gender of User Ticket {$i} is Required!");
                }
            }
            // Address
            if ($request->has("input_address_{$i}")) {
                if ($request->input("input_address_{$i}") == null) {
                    array_push($err, "Address of User Ticket {$i} is Required!");
                }
            }

        }

        // Redirect
        if (count($err) != 0) {
            $event_id = Crypt::encryptString($request->event_id);

            //return error
            return redirect("/details/{$event_id}")->with([
                'transaction_validate_fail' => $err[0],
            ]);
        } else {
            // Insert Into Transaction Table
            $trans = Transactions::create([
                "user_id" => Auth::user()->id,
                "event_id" => (int) $request->event_id,
                "ticket_id" => (int) $request->ticket_id,
                "transaction_ticket_count" => (int) $request->ticket_count,
                "transaction_ppn" => (int) $request->ppn_tax,
                "transaction_app_service" => (int) $request->app_service,
                "transaction_end_date" => Carbon::now()->addDays(3),
                "transaction_total" => (int) $request->total_payment,
                "transaction_is_paid" => 0,
            ]);

            // Insert into ticket user table
            for ($i = 1; $i < (int) $request->ticket_count + 1; $i++) {

                $arr = [
                    "transaction_id" => (int) $trans->transaction_id,
                    "ticket_user_email" => $request->input("input_email_{$i}"),
                    "ticket_user_name" => $request->input("input_name_{$i}"),
                    "ticket_user_phone" => $request->input("input_phone_{$i}"),
                    "ticket_user_bdate" => $request->input("input_date_{$i}"),
                    "ticket_user_gender" => $request->input("input_gender_{$i}"),
                    "ticket_user_address" => $request->input("input_address_{$i}"),
                ];

                TicketUsers::create($arr);
            }

            // set config mitrans
            Config::$serverKey = config("midtrans.serverKey");
            Config::$isProduction = config("midtrans.is_production");
            Config::$isSanitized = config("midtrans.is_sanitized");
            Config::$is3ds = config("midtrans.is_3ds");

            // get array to send to midtrans
            $midtrans_params = [
                "transaction_details" => [
                    "order_id" => "MIDTRANS-" . uniqid(),
                    "gross_amount" => (int) $request->total_payment,
                ],
                "customer_details" => [
                    "first_name" => Auth::user()->name,
                    "email" => Auth::user()->email,
                    "phone" => Auth::user()->phone,
                    "address" => Auth::user()->address,
                ],
                "enabled_payments" => ['gopay', 'bank_transfer'],
                "vtweb" => [],

            ];

            try {
                // get payment page midtrans
                $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

                // dd($paymentUrl);
                // redirect to payment page
                return redirect($paymentUrl);

                // header('location: ' . $paymentUrl);
            } catch (Exception $e) {
                //throw error
                echo $e->getMessage();
            }

            //redirect to index
            // return redirect("/transactions/payments")->with(['create_transaction_success' => 'Go Complate the Payment']);
        }
    }
}
