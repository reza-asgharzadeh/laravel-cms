<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ActivityLogController extends Controller
{
    public function index()
    {
        Gate::authorize('view-posts');

        $userId = auth()->user()->id;
        $sessions = DB::table('sessions')->where('user_id',$userId)->get();
        $activities = ActivityLog::where('user_id',$userId)->orderBy('id')->take(3)->get();
        return view('panel.users.profile.activity',compact(['sessions','activities']));
    }

    public function destroy(Request $request)
    {
        Gate::authorize('delete-activities');

        $id = $request->getPathInfo(); // panel/activity/ISStByQSgg9SVPPig2OmvuSyE8naqK0FJe5xvpxR"
        $array = explode("/",$id); // array[3] == ISStByQSgg9SVPPig2OmvuSyE8naqK0FJe5xvpxR
        DB::table('sessions')->where('user_id',auth()->user()->id)->where('id',$array[3])->delete();
        return back();
    }
}
