<?php


namespace Modules\Frontend\Actions\Auth;


use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class PostLoginAction
{
    public function handle(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (settings('recaptcha_auth_enable') == 'active') {

        }
        if (auth('frontend')->attempt($credentials)) {
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
