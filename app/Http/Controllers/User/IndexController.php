<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class IndexController extends Controller
{
    //For User
    public function index()
    {
        // get user id
        $user_id = Auth::user() == null ? 0 : Auth::user()->id;

        // Get Events
        $carousel = Events::orderBy('event_id', "desc")->take(3)->get();
        $eventShow = Events::orderBy('event_id', "desc")->take(8)->get();

        $wishlist = Wishlists::leftjoin("users", "users.id", "=", "wishlists.user_id")
            ->leftjoin("events", "events.event_id", "=", "wishlists.event_id")
            ->where("wishlists.user_id", "=", $user_id)
            ->orderBy('wishlists.wishlist_id', "desc")
            ->get();

        foreach ($eventShow as $key => $value) {
            foreach ($wishlist as $key2 => $value2) {
                if ($value->event_id == $value2->event_id) {
                    $eventShow[$key]->wishlist = true;
                    $eventShow[$key]->wishlist_id = $value2->wishlist_id;
                }
            }
        }

        return view(
            'pages.user.pages.index',
            compact(
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
        // get user id
        $user_id = Auth::user() == null ? 0 : Auth::user()->id;

        // Get Events
        $events = Events::leftjoin("users", "users.id", "=", "events.user_id")
            ->leftjoin("tickets", "tickets.event_id", "=", "events.event_id")
            ->orderBy('events.event_id', "desc")
            ->get();

        $wishlist = Wishlists::leftjoin("users", "users.id", "=", "wishlists.user_id")
            ->leftjoin("events", "events.event_id", "=", "wishlists.event_id")
            ->where("wishlists.user_id", "=", $user_id)
            ->orderBy('wishlists.wishlist_id', "desc")
            ->get();

        foreach ($events as $key => $value) {
            foreach ($wishlist as $key2 => $value2) {
                if ($value->event_id == $value2->event_id) {
                    $events[$key]->wishlist = true;
                    $events[$key]->wishlist_id = $value2->wishlist_id;
                }
            }
        }

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

    public function about()
    {
        return view('pages.user.pages.about');
    }

    public function partnership()
    {
        return view('pages.user.pages.partnership');
    }
}
