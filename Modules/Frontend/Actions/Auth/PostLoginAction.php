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

        if (auth('frontend')->attempt($credentials)) {
            $request->session()->regenerate();
//            $request->session()->flash('message', 'Login successful!');
            Toast::message('Login successful!')
                ->success()
                ->centerTop();
            return redirect()
                ->intended('profile')
                ;
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
