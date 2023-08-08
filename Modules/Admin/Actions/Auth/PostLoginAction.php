<?php


namespace Modules\Admin\Actions\Auth;


use Illuminate\Support\Facades\Auth;
use Modules\Admin\Requests\LoginRequest;

class PostLoginAction
{
    public function handle(LoginRequest $request){
        $credentials = $request->getCredentials();

        if(!Auth::guard('admin')->validate($credentials)):
            return response(trans('auth.failed'),401);
        endif;
        $user = Auth::guard('admin')->getProvider()->retrieveByCredentials($credentials);
        Auth::guard('admin')->login($user);
        return $user;
    }
}
