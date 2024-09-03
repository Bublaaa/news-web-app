<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirect
{
    public function handle($request, Closure $next, string $role = null)
    {
        $user = Auth::user();
        if ($user) {
            if ($user->role === $role) {
                return $next($request);
            } else {
                if ($user->role === 'admin') {
                    return redirect('/admin-dashboard');
                } elseif ($user->role === 'author') {
                    return redirect('/author-dashboard');
                } else {
                    return redirect('/');
                }
            }
        }

        return redirect('/login'); 
    }
}