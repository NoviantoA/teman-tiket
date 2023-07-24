<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->authenticate();

        $request->session()->regenerate();


        # Get data user
        $user = User::leftJoin('roles', 'roles.role_id', '=', 'users.role_id')
            ->whereRaw('email = ? ', [$request->email])->first();

        
        // array for session
        $session = array(
            'isLogin' => 'Berhasil Login',
            'user_nama' => $user->name,
            'user_role' => $user->role_name,
        );

        session([
            'isLogin' => 'Berhasil Login',
            'user_nama' => $user->name,
            'user_role' => $user->role_name,
        ]);

        Session::flash('user_role', $user->role_name);

        switch ($user->role_id) {
            case 1:
                return redirect()->intended(RouteServiceProvider::HOMEADMIN);
                break;
            case 2:
                return redirect()->intended(RouteServiceProvider::HOMEADMIN);
                break;
            case 3:
                return redirect()->intended(RouteServiceProvider::HOMEMITRA);
                break;
            case 4:
                return redirect()->intended(RouteServiceProvider::HOMEUSER);
                break;
            
            default:
                return redirect()->intended(RouteServiceProvider::HOMEUSER);
                break;
        }


        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
