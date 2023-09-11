<?php

namespace Modules\Frontend\Actions\MyAccount;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use ProtoneMedia\Splade\Facades\Toast;

class PostUpdatePasswordAction
{
    public function handle(Request $request)
    {
        $user = frontend_user();

        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);
        $user->password = \Hash::make($request->input('password'));
        $user->save();
        Toast::message('Update Password successfully!')
            ->success()
            ->centerTop();


        return redirect('/my-account/edit-profile');
    }
}
