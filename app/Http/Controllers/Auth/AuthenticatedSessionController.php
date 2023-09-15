<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     // dd($r)
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

    public function store(Request $request): RedirectResponse
    {
        // dd($r)
        if (Auth::guard('petugas')->attempt($request->only('email', 'password'), $request->input('remember'))) {
            // Autentikasi berhasil untuk petugas
            return redirect()->intended('/dashboard'); // Ganti dengan rute yang sesuai
        }
        // Autentikasi ke tabel users jika autentikasi petugas gagal
        if (Auth::attempt($request->only('email', 'password'), $request->input('remember'))) {
            // Autentikasi berhasil untuk users
            return redirect()->intended('/dashboard'); // Ganti dengan rute yang sesuai
        }

        // Autentikasi gagal
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
