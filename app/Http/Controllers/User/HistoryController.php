<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\Tickets;
use App\Models\Transactions;
use App\Models\TicketUsers;

class HistoryController extends Controller
{
    //For histories controller
    function index(){
        // Get ID User
        $user_id = Auth::user()->id;

        // Get Transaction
        $trans = Transactions::leftjoin("events","events.event_id","=","transactions.event_id")
        ->where("transactions.user_id", $user_id)
        ->get();

        $success_trans =  Transactions::leftjoin("events","events.event_id","=","transactions.event_id")
        ->where("transactions.user_id", $user_id)
        ->where("transactions.transaction_is_paid", 1)
        ->get();
        
        $pending_trans =  Transactions::leftjoin("events","events.event_id","=","transactions.event_id")
        ->where("transactions.user_id", $user_id)
        ->where("transactions.transaction_is_paid", 0)
        ->get();

        $fail_trans =  Transactions::leftjoin("events","events.event_id","=","transactions.event_id")
        ->where("transactions.user_id", $user_id)
        ->where("transactions.transaction_is_paid", 3)
        ->get();

        return view(
            'pages.user.pages.histories.histories',
            compact(
                "trans",
                "success_trans",
                "pending_trans",
                "fail_trans",
            )
        );
    }
}
