<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
use Modules\Frontend\Requests\SignupRequest;
use ProtoneMedia\Splade\Facades\Toast;

class PostSignupAction
{
    public function handle(SignupRequest $request)
    {
        $data = $request->all();
        $data['password'] = \Hash::make($data['password']);
        $user = VisaUser::create($data);
        lessgap_handle_event('after_customer_signup', ['user' => $user]);
//        auth('frontend')->login($user);
        Toast::message('Signup successfully!')
            ->success()
            ->centerTop();
        return redirect('/login');
    }
}
