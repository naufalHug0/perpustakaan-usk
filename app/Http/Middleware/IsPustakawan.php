<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsPustakawan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('pustakawan')->check() && Auth::guard('pustakawan')->user()->level == 'Pustakawan' ?? false) {
            return $next($request);
        }

        $role = Auth::guard('admin')->check() ? 'admin' : 'anggota';

        return redirect("/$role")->with('error', 'You are not allowed');
    }
}
