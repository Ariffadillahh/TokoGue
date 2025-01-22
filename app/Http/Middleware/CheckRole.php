<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user && in_array($user->level, $roles)) {
            return $next($request);
        }
        
        // Redirect to '/dashboard' if user has 'admin' or 'superadmin' role
        if ($user && ($user->level == 'admin' || $user->level == 'superadmin')) {
            return redirect('/dashboard');
        } 
        
        // Redirect to '/' if user has any other role
        if ($user && $user->level == 'user') {
            return redirect('/');
        }
        
        // Redirect to '/' for other roles
        return redirect('/');
    }
}
