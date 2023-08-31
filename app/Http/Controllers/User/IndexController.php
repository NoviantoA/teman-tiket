<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class IndexController extends Controller
{
    //For User
    public function index()
    {
        // Get Events
        $carousel = Events::orderBy('event_id', "desc")->take(3)->get();
        $eventShow = Events::orderBy('event_id', "desc")->take(8)->get();

        return view(
            'pages.user.pages.index',
            compact(
                // "carousel",
                "eventShow",
                "carousel"
            ),
        );
    }

    public function details($id)
    {
        // Decrypt $id
        $decode = Crypt::decryptString($id);

        // Get Events
        $event = Events::leftjoin("users", "users.id", "=", "events.user_id")
            ->leftjoin("tickets", "tickets.event_id", "=", "events.event_id")
            ->find((int) $decode);

        return view(
            'pages.user.pages.events.eventsDetail',
            compact(
                "event",
            ),
        );
    }
    public function detailAll()
    {
        // Get Events
        $events = Events::leftjoin("users", "users.id", "=", "events.user_id")
            ->leftjoin("tickets", "tickets.event_id", "=", "events.event_id")
            ->orderBy('events.event_id', "desc")
            ->get();

        return view(
            'pages.user.pages.events.events',
            compact(
                "events",
            ),
        );
    }
    public function buyTicket(Request $request)
    {
        // Validate input
        $request->validate([
            'ticket_count' => 'string|regex:/^[0-9]+$/u|nullable',
            'event_price' => 'required|string|regex:/^[0-9]+$/u|nullable',
        ]);
        // User must be logged in
        if (Auth::user() == null) {
            //redirect to index
            return back()->with(['create_transaction_fail' => 'You Must be Logged In !']);
        }

        if ($request->ticket_count == null || (int) $request->ticket_count == 0) {
            //redirect to index
            return back()->with(['create_transaction_fail' => 'Please fill the ticket person at least 1 !']);
        }

        //redirect to index
        return redirect("/transactions")->with([
            'create_transaction_msg' => 'Ticket Created Successfully',
            "data_transactions" => [
                "event_price" => (int) $request->event_price,
                "ticket_id" => (int) $request->ticket_id,
                "event_id" => (int) $request->event_id,
                "ticket_count" => (int) $request->ticket_count,
            ],
        ]);
    }
}