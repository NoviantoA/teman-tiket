<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\Transactions;
use App\Models\Withdraws;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MitraDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mendapatkan data user yang sedang login
        $ticketCount = Tickets::whereHas('event.user', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();

        $soldTicketCount = Tickets::whereHas('event.user', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->sum('ticket_sold');

        $totalRevenue = Transactions::whereHas('event.user', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('transaction_is_paid', 1)->sum('transaction_total');

        $totalRevenueWithdraw = Transactions::whereHas('event.user', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('transaction_is_paid', 1)
            ->sum(DB::raw('transaction_total - transaction_app_service - transaction_ppn'));

        $soldTickets = Tickets::whereHas('event.user', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('ticket_sold', '>', 0)->get();

        $withdraws = Withdraws::with('bank.user')
            ->whereHas('bank.user', function ($query) use ($user) {
                $query->where('role_id', 3)
                    ->where('id', $user->id);
            })
            ->get();

        return view('pages.mitra.dashboard', compact('ticketCount', 'soldTicketCount', 'totalRevenue', 'totalRevenueWithdraw', 'soldTickets', 'withdraws'));
    }
}