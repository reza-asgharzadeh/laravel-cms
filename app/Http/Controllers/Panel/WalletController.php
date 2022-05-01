<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WalletController extends Controller
{
    public function index()
    {
        Gate::authorize('view-wallet');

        $wallet = auth()->user()->wallet()->first();
        return view('panel.users.wallet',compact('wallet'));
    }

    public function update(Request $request, $id)
    {
        //
    }
}
