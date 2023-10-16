<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Modules\Frontend\Requests\SignupRequest;
use ProtoneMedia\Splade\Facades\Toast;

class SocialAuthAction
{
    public function handle(Request $request)
    {
        $provider = $request->route('provider');
        $configs = settings(['login_' . $provider . '_id', 'login_' . $provider . '_secret']);

        $client = new Google_Client();
        $client->setClientId($configs['login_' . $provider . '_id']);
        $client->setClientSecret($configs['login_' . $provider . '_secret']);
        $client->setRedirectUri(url(''));

        $token = $client->fetchAccessTokenWithAuthCode($request->input('code'));
        $client->setAccessToken($token['access_token']);

        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $exist = VisaUser::where([
            'email' => $google_account_info->email
        ])->first();
        $user = VisaUser::updateOrCreate([
            'email' => $google_account_info->email
        ],
            [
                'full_name' => $google_account_info->name
            ]
        );
        if (!$exist) {
            lessgap_handle_event('after_customer_signup', ['user' => $user]);
        }

        auth('frontend')->login($user);
        Toast::message('Login successfully!')
            ->success()
            ->centerTop();
        return $user;
    }
}
