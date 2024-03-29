<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use App\Rules\recaptcha;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'regex:/[a-z0-9_.]+@((yahoo|gmail)\.com)/' ,'max:100', 'unique:users'],
            'mobile' => ['required', 'numeric', 'digits:11', 'regex:/09([0-9])/' ,'unique:users'],
            'password' => ['required', 'string', 'max:256', 'confirmed', Rules\Password::defaults()],
            'g-recaptcha-response' => [new recaptcha()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
        ]);

        Wallet::create([
            'user_id' => Auth::user()->id,
        ]);

        event(new Registered($user));

        $request->session()->flash('login-register','ثبت نام شما با موفقیت انجام شد!');
        return redirect(RouteServiceProvider::HOME);
    }
}
