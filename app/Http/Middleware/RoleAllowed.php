<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check())
            return redirect()->route('login');

        $userRole = Auth::user()->role;
        $role = Role::where('id', '=', $userRole)->first()->name;

        foreach ($roles as $allowed) {
            if ($role == $allowed)
                return $next($request);
        }

        return redirect()->route('home');
    }
}
