<?php

namespace App\Http\Controllers\Panel\edit_profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\profile\UserCommunicationRequest;
use App\Http\Requests\Panel\User\profile\UserInformationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserInformationEditController extends Controller
{
    public function userInformation()
    {
        Gate::authorize('view-user-information');

        $user = auth()->user();
        return view('panel.users.profile.user_information',compact('user'));
    }

    public function userCommunication()
    {
        Gate::authorize('view-user-communication');

        $user = auth()->user();
        return view('panel.users.profile.user_communication',compact('user'));
    }

    public function userInformationUpdate(UserInformationRequest $request, User $user)
    {
        Gate::authorize('update-user-information');

        $data = $request->validated();

        $user->userInformation()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            $data
        );

        $request->session()->flash('status','اطلاعات فردی شما با موفقیت ویرایش شد !');
        return back();
    }

    public function userCommunicationUpdate(UserCommunicationRequest $request, User $user)
    {
        Gate::authorize('update-user-communication');

        $data = $request->validated();

        $user->userInformation()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            $data
        );

        $request->session()->flash('status','راه‌های ارتباطی با شما با موفقیت ویرایش شد !');
        return back();
    }
}
