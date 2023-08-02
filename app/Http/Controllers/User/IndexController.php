<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\Tickets;

class IndexController extends Controller
{
    //For User
    function index(){
        // Get Events
        $carousel = Events::orderBy('event_id',"desc")->take(3)->get();
        $eventShow = Events::orderBy('event_id',"desc")->take(8)->get();

        // dd($eventShow);

        return view(
            'pages.user.pages.index',
            compact(
                "carousel",
                "eventShow"
            ),
        );
    }

    function details($id){
        // Decrypt $id
        $decode = Crypt::decryptString($id);

        // Get Events
        $event = Events::leftjoin("users","users.id","=","events.user_id")
        ->leftjoin("tickets","tickets.event_id","=","events.event_id")
        ->find((int)$decode);

        return view(
            'pages.user.pages.events.eventsDetail',
            compact(
                "event",
            ),
        );
    }
    function detailAll(){
        // Decrypt $id
        // $decode = Crypt::decryptString($id);

        // Get Events
        $events = Events::leftjoin("users","users.id","=","events.user_id")
        ->leftjoin("tickets","tickets.event_id","=","events.event_id")
        ->orderBy('events.event_id',"desc")
        ->get();

        return view(
            'pages.user.pages.events.events',
            compact(
                "events",
            ),
        );
    }
    function buyTicket(Request $request){
        // Validate input
        $request->validate([
            'ticket_count'=> 'required|string|regex:/^[0-9]+$/u|nullable',
            'event_price'=> 'required|string|regex:/^[0-9]+$/u|nullable',
        ]);
        // User must be logged in
        if(Auth::user() == null){
            //redirect to index
            return back()->with(['create_transaction_fail' => 'You Must be Logged In !']);
        }

        if($request->ticket_count == null || (int)$request->ticket_count == 0){
            //redirect to index
            return back()->with(['create_transaction_fail' => 'Please fill the ticket person at least 1 !']);
        }



        //redirect to index
        return back()->with(['create_transaction_success' => 'Ticket Created Successfully']);
    }
}
