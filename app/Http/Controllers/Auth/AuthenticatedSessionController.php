<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\ActivityLog;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        ActivityLog::create([
            'user_id' => Auth::user()->id,
        ]);
        $request->session()->flash('login-register','شما با موفقیت وارد حساب خود شدید!');

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(Request $request)
    {
        $social_user = Socialite::driver('google')->user();
        $user = User::where('email',$social_user->getEmail())->first();

        if(!$user){
            $user = User::create([
                'name' => $social_user->getName(),
                'email' => $social_user->getEmail(),
                'mobile' => null,
                'password' => Hash::make($social_user->getId()),
                'role_id' => 1,
                'email_verified_at' => now(),
            ]);
        }

        ActivityLog::create([
            'user_id' => Auth::user()->id,
        ]);

        Auth::login($user);
        $request->session()->flash('login-register','شما با موفقیت وارد حساب خود شدید!');
        return redirect(RouteServiceProvider::HOME);
    }
}
