<?php
namespace App\View\Composers;
use App\Models\Alert;
use Carbon\Carbon;
use Illuminate\View\View;

class AlertComposer{
    protected $alert;

    public function __construct()
    {
        $this->alert = Alert::where('is_approved',true)->where('expiry_date', '>=', Carbon::now())->first();
    }

    public function compose(View $view)
    {
        $view->with('alert',$this->alert);
    }
}
