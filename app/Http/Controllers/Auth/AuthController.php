<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function admin ()
    {
        return view('pages.auth.login', ['role' => 'admin']);
    }

    public function anggota ()
    {
        return view('pages.auth.login', ['role' => 'anggota']);
    }

    public function pustakawan ()
    {
        return view('pages.auth.login', ['role' => 'pustakawan']);
    }

    public function login (Request $request)
    {
        $validatedData = $request->validate([
            'role'=>'required|in:admin,pustakawan,anggota'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $role = strtolower($validatedData['role']);

        if ($role !== 'anggota') {
            $credentials['level'] = $role;
        }

        if (Auth::guard($role)->attempt($credentials)) {
            $request->session()->regenerate();

            if (in_array($role, ['admin','pustakawan'])) {
                if (Auth::guard($role)->user()->status == 'Tidak Aktif') {
                    return redirect()->back()->with('error', 'Akun anda tidak aktif');
                }
            }
            
            return redirect()->intended("/$role");
        } 
        
        return redirect()->back()->with('error','Username atau password salah');
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->withSuccess("Logout successfully!");
    }
}
