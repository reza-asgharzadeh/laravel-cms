<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class SetPermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(5);
        $roles = Role::paginate(5);
        return view('panel.setpermissions.index',compact(['permissions','roles']));
    }

    public function store(Request $request)
    {
        $role_name = Role::where('name',$request->role_name)->first();
        $permission_id = $request->permission_id;
        $role_name->permissions()->sync($permission_id);
        $request->session()->flash('status','دسترسی به نقش مورد نظر اختصاص داده شد !');
        return back();
    }
}
