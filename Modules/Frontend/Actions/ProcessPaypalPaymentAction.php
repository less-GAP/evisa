<?php

namespace Modules\Frontend\Actions;


use App\Services\PaypalPaymentService;
use Illuminate\Http\Request;

class ProcessPaypalPaymentAction
{
    public function handle(Request $request)
    {
        $visaApplication = $request->session()->get('currentVisa');
        $url = app(PaypalPaymentService::class)->createInvoice($visaApplication);
        dd($url);
        return redirect($url);

    }
}
