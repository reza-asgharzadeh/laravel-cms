<?php

namespace App\Http\Controllers\Panel\edit_profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\profile\AccountInformationRequest;
use App\Http\Requests\Panel\User\profile\AccountPasswordRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccountInformationEditController extends Controller
{
    public function accountInformation()
    {
        Gate::authorize('edit-profile');

        $user = auth()->user();
        return view('panel.users.profile.account_information',compact('user'));
    }

    public function accountPassword()
    {
        Gate::authorize('edit-profile');

        $user = auth()->user();
        return view('panel.users.profile.account_password',compact('user'));
    }

    public function accountInformationUpdate(AccountInformationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('profile')){
            $file = $request->file('profile');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('profiles/images/', $file_name, 'public_files');
            $data['profile'] = $file_name;
        }

        auth()->user()->update(
            $data
        );
        $request->session()->flash('status','اطلاعات کاربری شما با موفقیت ویرایش شد !');
        return back();
    }

    public function accountPasswordUpdate(AccountPasswordRequest $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->password)){
            throw ValidationException::withMessages([
                'old_password' => ['رمز عبور فعلی را نادرست وارد کرده‌اید.']
            ]);
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        $request->session()->flash('status','رمز عبور شما با موفقیت ویرایش شد !');
        return back();
    }
}
