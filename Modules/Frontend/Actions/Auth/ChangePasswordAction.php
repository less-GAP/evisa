<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Lessgap\Services\EmailService;
use ProtoneMedia\Splade\Facades\Toast;

class ChangePasswordAction
{
    public function handle(Request $request)
    {
        $email = session('reset_email');
        $code = session('reset_password_code');
        if (!$email || !$code || $code !== cache()->get('reset_code_' . $email)) {
            return redirect()->intended('/reset-password');
        }
        return view('front::change-password');
    }
}
