<?php

namespace Modules\Frontend\Actions;


use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class ProfileAction
{
    public function handle()
    {
        $customer_info = Auth::guard('frontend')->user();
        return view('Frontend::profile', [
            'form' => $customer_info,
        ]);
    }


}
