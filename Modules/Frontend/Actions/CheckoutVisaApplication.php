<?php

namespace Modules\Frontend\Actions;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApplicant;
use App\Services\PaymentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutVisaApplication
{
    public function handle(Request $request)
    {
//        $visaApplication = $request->session()->get('currentVisa');
//        if(! $visaApplication->square_payment_url){
//            app(PaymentService::class)->createPaymentLink($visaApplication);
//        }
        return view('front::checkout', [
            'visaApplication'=> $request->session()->get('currentVisa')
        ]);
    }
}
