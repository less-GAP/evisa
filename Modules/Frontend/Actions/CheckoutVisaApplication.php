<?php

namespace Modules\Frontend\Actions;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApplicant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutVisaApplication
{
    public function handle(Request $request)
    {

        return view('Frontend::checkout', [
            'visaApplication'=> $request->session()->get('currentVisa')
        ]);
    }
}
