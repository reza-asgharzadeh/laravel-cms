<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Permission\CreatePermissionRequest;
use App\Http\Requests\Panel\Permission\UpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::paginate(5);
        return view('panel.permissions.index',compact('permissions'));
    }

    public function store(CreatePermissionRequest $request)
    {
        Permission::create(
            $request->validated()
        );
        $request->session()->flash('status','دسترسی جدید با موفقیت ایجاد شد !');
        return back();
    }

    public function edit(Permission $permission)
    {
        return view('panel.permissions.edit',compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update(
            $request->validated()
        );
        $request->session()->flash('status','دسترسی مورد نظر با موفقیت ویرایش شد !');
        return redirect()->route('permissions.index');
    }

    public function destroy(Request $request, Permission $permission)
    {
        $permission->delete();
        $request->session()->flash('status','دسترسی مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
