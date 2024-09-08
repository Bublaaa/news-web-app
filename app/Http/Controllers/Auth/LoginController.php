<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Check the authenticated user's role
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return '/admin';  // Redirect to /admin
        } elseif ($role === 'author') {
            return '/author';  // Redirect to /author
        }

        return '/'; // Default redirection for unrecognized roles
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}