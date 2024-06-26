<?php


namespace Modules\Frontend\Actions\Auth;


use App\Services\RecaptchaService;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class PostLoginAction
{
    public function handle(Request $request)
    {
         $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'captcha' => [settings('recaptcha_auth_enable') == 'active' ? 'required' : ''],
        ]);
        if (settings('recaptcha_auth_enable') == 'active') {
            app(RecaptchaService::class)->verify($request->input('captcha'),$request->ip());
        }
        if (auth('frontend')->attempt($request->only([
            'email', 'password'
        ]))) {
            $request->session()->regenerate();
//            $request->session()->flash('message', 'Login successful!');
            Toast::message('Login successful!')
                ->success()
                ->centerTop();
            return redirect()
                ->intended('my-account');
        }
        Toast::message('The provided credentials do not match our records.')
            ->warning()
            ->centerTop();
        return back()->onlyInput('email');
    }
}
