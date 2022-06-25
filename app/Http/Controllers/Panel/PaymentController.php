<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('view-payments');

        if(isset($request->status)) {
            $payments = match ($request->status) {
                '0' => Payment::where('status', 0)->paginate(10),
                '1' => Payment::where('status',1)->paginate(10),
            };
            return view('panel.payments.index',compact('payments'));
        }

        $payments = Payment::paginate(10);
        return view('panel.payments.index',compact('payments'));
    }

    public static function storeSuccessRequest($invoice,$dataModel,$transactionId)
    {
        $dataModel->payments()->create([
            'transaction_id' => $transactionId,
            'total' => $invoice->getAmount(),
            'gateway_name' => $invoice->getDriver(),
        ]);
    }

    public static function updateSuccessCallBack($record,$receipt)
    {
        $record->update([
            'RefID' => $receipt->getReferenceId(),
            'status' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
