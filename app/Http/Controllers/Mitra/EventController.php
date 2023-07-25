<?php

namespace App\Http\Controllers\Mitra;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Events;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    //Defined for events
    public function get(){
        // Get user_id
        $userID = Auth::user()->id;

        // Get all event by id
        $events = Events::where("user_id", $userID)
        ->orderBy('event_id',"desc")
        ->get();
        return view(
            'pages.mitra.pages.events.get',
            compact(
                'events'
            ),
        );
    }

    
    public function store(){
        return view('pages.mitra.pages.events.addEvents');
    }
    public function post(Request $request){
        $request->validate([
            'event_poster' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'event_name' => 'required',
            'event_location'=> 'required',
            'event_date'=> 'required',
            'event_city'=> 'required',
            'event_description'=> 'required',
            'event_price'=> 'required',
        ]);

        $hashName = "";
        if ($request->hasFile('event_poster')) {
            $img = $request->file('event_poster');
            // get image extension
            $img_name = $img->hashName();
            $hashName = $img->hashName();
            $imagePath = 'store/mitra/events/';
            // upload image
            $img->move($imagePath,$img_name);
        }

        $userID = Auth::user()->id;

        // Store in events table
        Events::create([
            'user_id'=> $userID,
            'ticket_id'=> 0,
            'transaction_id'=> 0,
            'wishlist_id'=> 0,
            'talent_id'=> 0,
            'event_name'=> $request->event_name,
            'event_location'=> $request->event_location,
            'event_date'=> $request->event_date,
            'event_city'=> $request->event_city,
            'event_poster'=> $hashName,
            'event_description'=> $request->event_description,
            'event_tag'=> '',
            'event_price'=> $request->event_price,
        ]);

        //redirect to index
        return back()->with(['create_event_success' => 'Event Created Successfully']);
    }

    function update($id, Request $request){
        // Validate
        $request->validate([
            'event_poster' => 'file|mimes:jpg,jpeg,png|max:2048',
            'event_name' => 'required',
            'event_location'=> 'required',
            'event_date'=> 'required',
            'event_city'=> 'required',
            'event_description'=> 'required',
            'event_price'=> 'required',
        ]);


        // Get Event
        $event = Events::find($id);

        $hashName = "";
        if ($request->hasFile('event_poster')) {
             // Delete Old File
            $imagePath = 'store/mitra/events/'.$event->event_poster;
            File::delete($imagePath);

            $img = $request->file('event_poster');
            // get image extension
            $img_name = $img->hashName();
            $hashName = $img->hashName();
            $imagePath = 'store/mitra/events/';
            // upload image
            $img->move($imagePath,$img_name);

            // Update Event
            $event->update([
                'event_name'=> $request->event_name,
                'event_location'=> $request->event_location,
                'event_date'=> $request->event_date,
                'event_city'=> $request->event_city,
                'event_poster'=> $hashName,
                'event_description'=> $request->event_description,
                'event_tag'=> '',
                'event_price'=> $request->event_price,
            ]);
        }else{
            // Update Event without img
            $event->update([
                'event_name'=> $request->event_name,
                'event_location'=> $request->event_location,
                'event_date'=> $request->event_date,
                'event_city'=> $request->event_city,
                'event_description'=> $request->event_description,
                'event_tag'=> '',
                'event_price'=> $request->event_price,
            ]);
        }

        //redirect to index
        return back()->with(['update_event_success' => 'Event Updated Successfully']);
    }

    function delete($id){
        // Get Event
        $event = Events::find($id);

        // Delete Old File
        $imagePath = 'store/mitra/events/'.$event->event_poster;
        File::delete($imagePath);

        // Delete it
        $event->delete();


        //redirect to index
        return back()->with(['delete_event_success' => 'Event Deleted Successfully']);

    }
}
