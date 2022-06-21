<?php

namespace App\Http\Controllers\Panel\edit_profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\profile\AccountInformationRequest;
use App\Http\Requests\Panel\User\profile\AccountPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccountInformationEditController extends Controller
{
    public function accountInformation()
    {
        Gate::authorize('view-account-information');

        $user = auth()->user();
        return view('panel.users.profile.account_information',compact('user'));
    }

    public function accountPassword()
    {
        Gate::authorize('view-account-password');

        $user = auth()->user();
        return view('panel.users.profile.account_password',compact('user'));
    }

    public function accountInformationUpdate(AccountInformationRequest $request,User $user)
    {
        Gate::authorize('update-account-information');

        $data = $request->validated();

        if ($request->hasFile('profile')){
            if (file_exists("images/profiles/".$user->id."/".$user->profile)){
                unlink("images/profiles/".$user->id."/".$user->profile);
            }
            $file = $request->file('profile');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('images/profiles/'.$user->id, $file_name, 'public_files');
            $data['profile'] = $file_name;
        }

        $user->update(
            $data
        );
        $request->session()->flash('status','اطلاعات کاربری شما با موفقیت ویرایش شد !');
        return back();
    }

    public function accountPasswordUpdate(AccountPasswordRequest $request,User $user)
    {
        Gate::authorize('update-account-password');

        if (!Hash::check($request->old_password, $user->password)){
            throw ValidationException::withMessages([
                'old_password' => ['رمز عبور فعلی را نادرست وارد کرده‌اید.']
            ]);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        $request->session()->flash('status','رمز عبور شما با موفقیت ویرایش شد !');
        return back();
    }
}
