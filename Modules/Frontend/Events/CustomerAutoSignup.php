<?php


namespace Modules\Frontend\Events;


use App\Models\VisaUser;
use Lessgap\Services\EmailService;

class CustomerAutoSignup
{
    public function handle(VisaUser $user, $password)
    {
        app(EmailService::class)->createEmail([
            'data' => [
                'customer' => $user,
                'password' => $password,
                'loginUrl' => env('APP_URL').'/login'
            ],
            'email_to' => $user->email,
            'reference_class' => get_class($user),
            'reference_key' => $user->getKey()
        ], 'email_template_auto_signup');
    }
}
