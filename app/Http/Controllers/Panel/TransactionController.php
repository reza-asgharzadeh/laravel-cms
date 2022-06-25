<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class TransactionController extends Controller
{
    public function invoice($dataModel,$amount,$type)
    {
        $description = match ($type) {
            "course" => "خرید دوره با شناسه سفارش $dataModel->id",
            "wallet" => "شارژ کیف پول با شناسه کاربری $dataModel->user_id"
        };

        $configPath = "payments.drivers." . config('payment.default');
        config([
            $configPath.'.description'=>$description,
        ]);

        $invoice = new Invoice;
        $invoice->amount($amount);
        $invoice->detail([
            'description' => config($configPath.'.description'),
        ]);

        $invoice->via(config('payment.default'));

        return $this->sendToGateway($invoice,$dataModel);
    }

    public function sendToGateway($invoice,$dataModel)
    {
        return Payment::purchase($invoice, function($driver, $transactionId) use ($invoice,$dataModel) {
            PaymentController::storeSuccessRequest($invoice,$dataModel,$transactionId);
        })->pay()->render();
    }

    public function callBackFromGateway(Request $request)
    {
        $record = \App\Models\Payment::where('transaction_id',$request->Authority)->first();

        try {

            $receipt = Payment::amount($record->total)->transactionId($record->transaction_id)->verify();

            session()->forget(['cart','coupon','coupon_id','discount','payable','wallet','newWalletValue']);


            PaymentController::updateSuccessCallBack($record,$receipt);

            if ($record->paymentable_type == "App\Models\Order"){
                OrderController::update($record);
                return view('client.transaction.success_callback',compact('record'));
            }

            WalletController::update($record);
            $request->session()->flash('status','کیف پول شما با موفقیت شارژ شد !');
            return to_route('wallets.index');

        } catch (InvalidPaymentException $exception) {

            session()->forget(['cart','coupon','coupon_id','discount','payable','wallet','newWalletValue']);

            return view('client.transaction.error_callback',compact('exception'));
        }
    }
}
