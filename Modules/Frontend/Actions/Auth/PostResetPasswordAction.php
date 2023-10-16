<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
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
            $code = \Str::uppercase(\Str::random(6));
            cache()->put('reset_code_' . $request->input('email'), $code, 60);
            app(EmailService::class)->createEmail([
                'data' => [
                    'email' => $request->input('email'),
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
