<?php


namespace Modules\Admin\Actions\Auth;


use App\Models\User;
use App\Models\VisaUser;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $user = User::where([
            'email' => $google_account_info->email
        ])->first();
        if (!$user) {
            return response(trans('auth.failed'), 401);
        }
        Auth::guard('admin')->login($user);

        return $user;
    }
}
