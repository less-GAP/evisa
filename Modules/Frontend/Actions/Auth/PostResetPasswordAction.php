<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Lessgap\Services\EmailService;
use ProtoneMedia\Splade\Facades\Toast;

class PostResetPasswordAction
{
    public function handle(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = VisaUser::where('email', $request->input('email'))->first();

        if ($user) {
            $time = 60 * 5;

            if ($code = $request->input('code')) {
                if ($code == cache()->get('reset_code_' . $request->input('email'))) {
                    $timeChangePassword = 60 * 5;
                    $request->session()->put('reset_password_code', $code);
                    cache()->put('reset_code_matched_valid_' . $request->input('email'), (string)Carbon::now()->add($time . ' seconds'), $timeChangePassword);
                    Toast::message('Please change your password!')
                        ->warning()
                        ->centerTop();
                    return redirect('/change-password');
                } else {
                    Toast::message('Wrong reset code!')
                        ->warning()
                        ->centerTop();
                    return back()->onlyInput('email');

                }
            }
            $code = \Str::padLeft(rand(0, 999999), '6', '0');
            $request->session()->put('reset_email', $request->input('email'));
            cache()->put('reset_code_' . $request->input('email'), $code, $time);
            cache()->put('reset_code_valid_' . $request->input('email'), (string)Carbon::now()->add($time . ' seconds'), $time);
            app(EmailService::class)->createEmail([
                'data' => [
                    'email' => $request->input('email'),
                    'user' => $user,
                    'code' => $code,
                    'loginUrl' => env('APP_URL') . '/login'
                ],
                'email_to' => $request->input('email'),
                'reference_class' => get_class($user),
                'reference_key' => $user->getKey()
            ], 'email_template_reset_password');

            Toast::message('Please check your email.')
                ->success()
                ->centerTop();

        } else {
            Toast::message('The provided credentials do not match our records.')
                ->warning()
                ->centerTop();
        }

        return back()->onlyInput('email');
    }
}
