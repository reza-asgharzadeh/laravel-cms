<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\CreateUserRequest;
use App\Http\Requests\Panel\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        Gate::authorize('view-users');

        $this->authorize('viewAny',auth()->user());
        $users = User::paginate(5);
        return view('panel.users.index',compact('users'));
    }

    public function create()
    {
        Gate::authorize('create-user');

        $this->authorize('create', auth()->user());
        $roles = Role::all();
        return view('panel.users.create',compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
        Gate::authorize('store-user');

        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        User::create(
            $data
        );

        $request->session()->flash('status','کاربر جدید با موفقیت ایجاد شد !');
        return to_route('users.index');
    }

    public function edit(User $user)
    {
        Gate::authorize('edit-users');

        $this->authorize('view', $user);
        $roles = Role::all();
        return view('panel.users.edit',compact(['user','roles']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('update-users');

        $this->authorize('update', $user);
        $data = $request->validated();
        if ($request->password){
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
        $user->update(
            $data
        );
        $request->session()->flash('status','کاربر مورد نظر با موفقیت ویرایش شد !');
        return to_route('users.index');
    }

    public function destroy(Request $request,User $user)
    {
        Gate::authorize('delete-users');

        $this->authorize('delete', $user);
        $user->delete();
        $request->session()->flash('status','کاربر مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
