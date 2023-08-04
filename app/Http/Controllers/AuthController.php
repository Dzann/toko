<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cek = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($cek)) {
            $user = Auth::user();
            if ($user->role == 'admin') 
            {
                return redirect()->route('admin.dashboard')->with('status', 'Selamat Datang : '.$user->name);
            } else 
            {
                return redirect()->route('home')->with('status', 'Selamat Datang : ' . $user->name);
            }

        }

        return back()->with('status', 'Email atau password salah');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer',
        ]);

        return redirect()->route('loginPage')->with('status', 'Berhasil Membuat Akun');
    }

}
