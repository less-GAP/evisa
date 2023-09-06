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
        auth('frontend')->login($user);
        Toast::message('Login successful!')
            ->success()
            ->centerTop();
        return redirect('profile');
    }
}
