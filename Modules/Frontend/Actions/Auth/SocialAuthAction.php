<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
use Laravel\Socialite\Facades\Socialite;
use Modules\Frontend\Requests\SignupRequest;
use ProtoneMedia\Splade\Facades\Toast;

class SocialAuthAction
{
    public function handle(Request $request)
    {
        $data = $request->all();
        $data['password'] = \Hash::make($data['password']);
        $provider = $request->route('provider');
        $configs = settings(['login_' . $provider . '_id', 'login_' . $provider . '_secret']);
        \Config::set('services.' . $provider, [
            'client_id' => $configs['login_' . $provider . '_id']
            , 'client_secret' => $configs['login_' . $provider . '_secret']
        ]);

        $socialUser = Socialite::driver($provider)->user();
        $user = VisaUser::updateOrCreate([
            'email' => $socialUser->getEmail()
        ],
            [
                'full_name' => $socialUser->getName()
            ]
        );
        auth('frontend')->login($user);
        Toast::message('Login successfully!')
            ->success()
            ->centerTop();
        return redirect('/my-account');
    }
}