<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Events;
use App\Models\Tickets;

class TicketController extends Controller
{
    //
    function get(){
        // Get Event By User ID
        $userID = Auth::user()->id;
        $events = Events::where("user_id",$userID)->get();
        
        $tickets = Tickets::leftJoin("events","events.event_id","=","tickets.event_id")
        ->whereRaw("user_id = ?",[$userID])
        ->orderBy('tickets.ticket_id',"desc")
        ->get();

        return view(
            "pages.mitra.pages.ticket.ticket",
            compact(
                "events",
                "tickets"
            ),
        );
    }
    function post(Request $request){
        // Validate input
        $request->validate([
            'event_name'=> 'required|string|regex:/^[a-zA-Z\\s+0-9]+$/u',
            'nameticket'=> 'required|string|regex:/^[a-zA-Z\\s+0-9]+$/u|nullable',
            'kuotaticket'=> 'required|string|regex:/^[0-9]+$/u|nullable',
        ]);

        // Convert string to int
        $event_id = (int)$request->event_name;

        // Check event sudah memiliki ticket atau tidak
        $tickets = Tickets::whereRaw("event_id = ?",[$request->event_name])
        ->first();

        if(empty($tickets) == true){
            // Save to table
            Tickets::create([
                "event_id"=>$event_id,
                "ticket_name"=>$request->nameticket,
                "ticket_capacity"=>$request->kuotaticket,
                "ticket_sold"=>0,
            ]);
        }else{
            //redirect to index
            return back()->with(['create_ticket_fail' => 'Ticket was created before']);
        }

        //redirect to index
        return back()->with(['create_ticket_success' => 'Ticket Created Successfully']);
    }
    

    function update($id, Request $request){
        // Validate input
        $request->validate([
            'event_name'=> 'string|regex:/^[a-zA-Z\\s+0-9]+$/u',
            'nameticket'=> 'required|string|regex:/^[a-zA-Z\\s+0-9]+$/u|nullable',
            'kuotaticket'=> 'required|string|regex:/^[0-9]+$/u|nullable',
        ]);
        
        $ticket = Tickets::find($id);

        $ticket->update([
            "ticket_name"=>$request->nameticket,
            "ticket_capacity"=>$request->kuotaticket,
        ]);


        //redirect to index
        return back()->with(['update_ticket_success' => 'Ticket Updated Successfully']);
    }
    function delete($id, Request $request){
        
        $ticket = Tickets::find($id)->delete();


        //redirect to index
        return back()->with(['delete_ticket_success' => 'Ticket Deleted Successfully']);
    }
}
