<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Lessgap\Services\EmailService;
use ProtoneMedia\Splade\Facades\Toast;

class PostChangePasswordAction
{
    public function handle(Request $request)
    {
        $email = session('reset_email');
        $code = session('reset_password_code');
        if (!$email || !$code || $code !== cache()->get('reset_code_' . $email)) {
            return redirect()->intended('/reset-password');
        }

        $request->validate([
            'password' => ['required','confirmed',Password::min(6)],
        ]);
        VisaUser::where('email',$email)->update(['password'=>\Hash::make($request->input('password'))]);
        $request->session()->forget('reset_email');
        $request->session()->forget('reset_password_code');
        Toast::message('Change password successfully!')
            ->success()
            ->centerTop();
        return redirect('/login');
    }
}
