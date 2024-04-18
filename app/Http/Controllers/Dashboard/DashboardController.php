<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $guard = $request->path();
        return view('pages.dashboard.index', ['user' => Auth::guard($guard)->user()]);
    }
}
