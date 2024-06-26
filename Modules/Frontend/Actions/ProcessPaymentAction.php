<?php

namespace Modules\Frontend\Actions;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApplicant;
use App\Services\PaymentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProcessPaymentAction
{
    public function handle(Request $request)
    {
        $visaApplication = $request->session()->get('currentVisa');
        $url = app(PaymentService::class)->getSquarePaymentUrl($visaApplication);
        return redirect($url);

    }
}
