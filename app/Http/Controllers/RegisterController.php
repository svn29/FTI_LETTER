<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_induk' => $request->no_induk
        ]);

        return redirect()->route('login')->with('success', 'Akun Berhasil Dibuat, Silakan Masuk');
    }
}
