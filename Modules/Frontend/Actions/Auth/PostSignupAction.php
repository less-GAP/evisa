<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
use Modules\Frontend\Requests\SignupRequest;

class PostSignupAction
{
    public function handle(SignupRequest $request)
    {
        $data = $request->all();
        $data['password'] = \Hash::make($data['password']);
        VisaUser::create($data);
    }
}
