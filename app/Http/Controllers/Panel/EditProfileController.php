<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id',auth()->user()->id)->first();
        return view('panel.users.profile',compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        if($request->password){
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('profile')){
            $file = $request->file('profile');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('profiles/images/', $file_name, 'public_files');
            $data['profile'] = $file_name;
        }

        auth()->user()->update(
            $data
        );
        $request->session()->flash('status','پروفایل شما با موفقیت ویرایش شد !');
        return back();
    }
}
