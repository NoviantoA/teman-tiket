<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function get(){
        // Get user_id
        $userID = Auth::user()->id;

        
        return view(
            'pages.mitra.pages.banks.bank',
        );
    }
}
