<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Role\CreateRoleRequest;
use App\Http\Requests\Panel\Role\UpdateRoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(5);
        return view('panel.roles.index',compact('roles'));
    }

    public function store(CreateRoleRequest $request)
    {
        Role::create(
            $request->validated()
        );
        $request->session()->flash('status','نقش جدید با موفقیت ایجاد شد !');
        return back();
    }

    public function edit(Role $role)
    {
        return view('panel.roles.edit',compact('role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update(
            $request->validated()
        );
        $request->session()->flash('status','نقش مورد نظر با موفقیت ویرایش شد !');
        return redirect()->route('roles.index');
    }

    public function destroy(Request $request, Role $role)
    {
        $users = User::where('role_id', '=', $role->id)->pluck('id');

        if($users->isEmpty()) {
            $role->delete();
            $request->session()->flash('status','نقش مورد نظر با موفقیت حذف شد !');
            return back();
        }
        else {
            $request->session()->flash('status','نقش no delete !');
            return back();
        }
    }
}
