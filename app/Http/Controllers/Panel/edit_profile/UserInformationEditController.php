<?php

namespace App\Http\Controllers\Panel\edit_profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\profile\UserCommunicationRequest;
use App\Http\Requests\Panel\User\profile\UserInformationRequest;
use Illuminate\Support\Facades\Gate;

class UserInformationEditController extends Controller
{
    public function userInformation()
    {
        Gate::authorize('edit-profile');

        $user = auth()->user();
        return view('panel.users.profile.user_information',compact('user'));
    }

    public function userCommunication()
    {
        Gate::authorize('edit-profile');

        $user = auth()->user();
        return view('panel.users.profile.user_communication',compact('user'));
    }

    public function userInformationUpdate(UserInformationRequest $request)
    {
        $data = $request->validated();
        auth()->user()->userInformation()->updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],
            $data
        );
        $request->session()->flash('status','اطلاعات فردی شما با موفقیت ویرایش شد !');
        return back();
    }

    public function userCommunicationUpdate(UserCommunicationRequest $request)
    {
        $data = $request->validated();
        auth()->user()->userInformation()->updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],
            $data
        );
        $request->session()->flash('status','راه‌های ارتباطی با شما با موفقیت ویرایش شد !');
        return back();
    }
}
