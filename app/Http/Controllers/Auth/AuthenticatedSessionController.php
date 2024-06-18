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

    public function index(): View
    {
        return view('landing.index');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Log the user's role for debugging
        \Log::info('User Role: ' . Auth::user()->role);

        // Redirect based on user role
        if (Auth::user()->hasRole('superadmin')) {
            return redirect()->route('superadmin.superadmin-dashboard');
        } elseif (Auth::user()->hasRole('trainer')) {
            return redirect()->route('trainer.trainer-dashboard');
        } elseif (Auth::user()->hasRole('user')) {
            return redirect()->route('user.user-dashboard');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
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
