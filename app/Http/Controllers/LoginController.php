<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   /**
     * Menampilkan formulir login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validasi data input
        $request->validate([
            'identity' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lakukan proses otentikasi
        $credentials = $request->only('identity', 'password');

        // Lakukan otentikasi baik berdasarkan email atau username
        if (Auth::attempt(['email' => $credentials['identity'], 'password' => $credentials['password']]) ||
            Auth::attempt(['username' => $credentials['identity'], 'password' => $credentials['password']])) {
            // Jika otentikasi berhasil, redirect ke halaman yang sesuai
            return redirect()->intended('/home');
        }

        // Jika otentikasi gagal, kembalikan dengan pesan error
        return back()->withErrors(['identity' => 'Invalid credentials']);
    }
}
