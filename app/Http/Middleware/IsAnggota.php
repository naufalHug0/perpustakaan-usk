<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAnggota
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('anggota')->check()) {
            return $next($request);
        }

        $role = Auth::guard('pustakawan')->check() ? 'pustakawan' : 'admin';

        return redirect("/$role")->with('error', 'You are not allowed');
    }
}
