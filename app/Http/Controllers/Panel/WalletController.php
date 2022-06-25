<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\Panel\Wallet\ChargeWalletRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WalletController extends TransactionController
{
    public function index()
    {
        Gate::authorize('view-wallet');

        $user = auth()->user();
        return view('panel.users.wallet',compact('user'));
    }

    public function chargeWallet(ChargeWalletRequest $request)
    {
        $user = auth()->user()->wallet;

        return $this->invoice($user,$request->price,'wallet');
    }

    public static function update($record)
    {
        Gate::authorize('update-wallet');

        auth()->user()->wallet->update([
            'value' =>  $record->total
        ]);
    }
}
