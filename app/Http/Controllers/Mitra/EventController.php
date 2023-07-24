<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //Defined for events
    public function get(){
        return view('pages.mitra.events.get');
    }
}
