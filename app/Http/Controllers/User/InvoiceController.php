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

class InvoiceController extends Controller
{
    //For Invoice Controller
    function index($id){
        $trans_id = Crypt::decryptString($id);

        $trans = Transactions::leftjoin("events","events.event_id","=","transactions.event_id")
        ->leftjoin("tickets","tickets.ticket_id","=","transactions.ticket_id")
        ->leftjoin("users","users.id","=","transactions.user_id")
        ->where("transactions.transaction_id",$trans_id)
        ->first();

        $ticket_users = TicketUsers::where("transaction_id",$trans_id)
        ->get();

        return view(
            'pages.user.pages.invoice.invoice',
            compact(
                "trans",
                "ticket_users",
            ),
            
        );
    }
    
}
