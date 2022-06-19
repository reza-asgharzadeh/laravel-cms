<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Alert\CreateAlertRequest;
use App\Http\Requests\Panel\Alert\UpdateAlertRequest;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AlertController extends Controller
{
    public function index()
    {
        Gate::authorize('view-alert-bars');

        $alerts = Alert::orderByDesc('id')->paginate(5);
        return view('panel.alerts.index',compact('alerts'));
    }

    public function create()
    {
        Gate::authorize('create-alert-bar');

        return view('panel.alerts.create');
    }

    public function store(CreateAlertRequest $request)
    {
        Gate::authorize('store-alert-bar');

        $data = $request->validated();
        Alert::create(
            $data
        );

        $request->session()->flash('status','اطلاع رسانی جدید با موفقیت ایجاد شد !');
        return to_route('alerts.index');
    }

    public function edit(Alert $alert)
    {
        Gate::authorize('edit-alert-bars');

        return view('panel.alerts.edit',compact('alert'));
    }

    public function isApproved(Request $request, Alert $alert)
    {
        Gate::authorize('is-approved-alert-bars');

        $alert->update([
            'is_approved' => ! $alert->is_approved
        ]);

        $request->session()->flash('status','وضعیت اطلاع رسانی با موفقیت تغییر کرد !');
        return to_route('alerts.index');
    }

    public function update(UpdateAlertRequest $request, Alert $alert)
    {
        Gate::authorize('update-alert-bars');

        $data = $request->validated();

        if (!$request->expiry_date){
            unset($data['expiry_date']);
        }

        $alert->update(
            $data
        );

        $request->session()->flash('status','اطلاع رسانی مورد نظر با موفقیت ویرایش شد !');
        return to_route('alerts.index');
    }

    public function destroy(Request $request, Alert $alert)
    {
        Gate::authorize('delete-alert-bars');

        $alert->delete();
        $request->session()->flash('status','اطلاع رسانی مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
