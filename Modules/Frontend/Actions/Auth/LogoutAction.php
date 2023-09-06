<?php


namespace Modules\Frontend\Actions\Auth;


use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class LogoutAction
{
    public function handle(Request $request)
    {
        auth('frontend')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Toast::message('Logout successfully.')
            ->warning()
            ->centerTop();


        return redirect('/');
    }
}
