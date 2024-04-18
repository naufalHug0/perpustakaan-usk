<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function forget (Request $request) {
        $request->session()->remove($request->key);

        return redirect()->back();
    }
}
