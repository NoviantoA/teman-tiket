<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class WishlistController extends Controller
{
    //
    public function index(Request $request)
    {
        // get user id
        $user_id = Auth::user()->id;

        // Get Wishlists
        $wishlists = Wishlists::leftjoin("users", "users.id", "=", "wishlists.user_id")
            ->leftjoin("events", "events.event_id", "=", "wishlists.event_id")
            ->where("wishlists.user_id", "=", $user_id)
            ->orderBy('wishlists.wishlist_id', "desc")
            ->get();

        return view(
            'pages.user.pages.wishlists.wishlists',
            compact(
                "wishlists",
            ),
        );
    }
    public function changeFromIndex(Request $request, $id)
    {
        // User must be logged in
        if (Auth::user() == null) {
            //redirect to index
            return back()->with(['create_transaction_fail' => 'You Must be Logged In !']);
        }

        // get previous page
        $previous = url()->previous();

        //get base url
        $base_url = url('/');

        //get user id
        $user_id = Auth::user()->id;

        // from index page
        if ($base_url . "/login" == $previous) {
            return redirect()->route('user.dashboard');
        }

        if ($id == 0) {
            // insert wishlists
            $wishlists = new Wishlists();
            $wishlists->user_id = $user_id;
            $wishlists->event_id = $request->event_id;
            $wishlists->save();

            // encrypt event_id
            $encrypted_event_id = Crypt::encryptString($request->event_id);

            if ($base_url . "/" == $previous) {
                return redirect()->route('user.dashboard')->with(['change_wishlist_success' => 'Success Add to Wishlists !']);
            } else if ($base_url . "/wishlists" == $previous) {
                return back()->with(['change_wishlist_success' => 'Success Add to Wishlists !']);
            } else if ($base_url . "/details" == $previous) {
                return redirect()->route('user.detailAll')->with(['change_wishlist_success' => 'Success Add to Wishlists !']);
            }

        } else {
            // delete wishlists
            $wishlists = Wishlists::where("wishlist_id", "=", $id)
                ->delete();

            if ($base_url . "/" == $previous) {
                return redirect()->route('user.dashboard')->with(['change_wishlist_success' => 'Success Remove from Wishlists !']);
            } else if ($base_url . "/wishlists" == $previous) {
                return back()->with(['change_wishlist_success' => 'Success Remove from Wishlists !']);
            } else if ($base_url . "/details" == $previous) {
                return redirect()->route('user.detailAll')->with(['change_wishlist_success' => 'Success Remove from Wishlists !']);
            }
        }
    }
}
