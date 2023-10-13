<?php

namespace Modules\Frontend\Actions;


use App\Models\VisaApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use ProtoneMedia\Splade\Facades\Toast;

class CheckStatusAction
{
    public function handle(Request $request)
    {
        $executed = RateLimiter::attempt(
            'check-status',
            $perMinute = 5,
            function () {
                // Send message...
            }
        );

        if (!$executed) {
            Toast::message('Too many request.')
                ->error()
                ->centerTop();
            return back();
        }
        $visaApplication = VisaApplication::where('order_no', $request->input('code'))
            ->where('contact_email', $request->input('email'))->first();
        if (!$visaApplication) {
            Toast::message('The provided information do not match our records.')
                ->warning()
                ->centerTop();
            return back();
        }
        return view('front::check-status', [
            'visaApplication' => $visaApplication,
        ]);
    }
}
