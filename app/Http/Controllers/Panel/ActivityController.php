<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index(){
        $userId = auth()->user()->id;
        $sessions = DB::table('sessions')->where('user_id',$userId)->get();
        return view('panel.users.activity',compact('sessions'));
    }

    public function destroy(Request $request){
        $id = $request->getPathInfo(); // panel/activity/ISStByQSgg9SVPPig2OmvuSyE8naqK0FJe5xvpxR"
        $array = explode("/",$id); // array[3] == ISStByQSgg9SVPPig2OmvuSyE8naqK0FJe5xvpxR
        DB::table('sessions')->where('user_id',auth()->user()->id)->where('id',$array[3])->delete();
        return back();
    }
}
