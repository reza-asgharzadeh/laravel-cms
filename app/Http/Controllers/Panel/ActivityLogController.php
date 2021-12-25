<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityLogController extends Controller
{
    public function index()
    {
        $getIp = Helper::get_ip();
        $getBrowser = Helper::get_browsers();
        $getDevice = Helper::get_device();
        $getOs = Helper::get_os();

        $userId = auth()->user()->id;
        $sessions = DB::table('sessions')->where('user_id',$userId)->get();
        $activities = ActivityLog::where('user_id',$userId)->orderBy('id')->take(3)->get();
        return view('panel.users.activity',compact(['sessions','activities','getIp','getBrowser','getDevice','getOs']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ActivityLog $activityLog)
    {
        //
    }

    public function edit(ActivityLog $activityLog)
    {
        //
    }

    public function update(Request $request, ActivityLog $activityLog)
    {
        //
    }

    public function destroy(ActivityLog $activityLog,Request $request)
    {
        $id = $request->getPathInfo(); // panel/activity/ISStByQSgg9SVPPig2OmvuSyE8naqK0FJe5xvpxR"
        $array = explode("/",$id); // array[3] == ISStByQSgg9SVPPig2OmvuSyE8naqK0FJe5xvpxR
        DB::table('sessions')->where('user_id',auth()->user()->id)->where('id',$array[3])->delete();
        return back();
    }
}
