<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            // Check if the authenticated user has a role that allows access
            if (in_array($userRole, $roles)) {
                return $next($request);
            }

            // Redirect authenticated users to their respective dashboards
            if ($userRole === 'student') {
                return redirect()->route('dashboard');
            } elseif ($userRole === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        // Allow guests access to specific routes (e.g., login and register)
        return $next($request);
    }
};
