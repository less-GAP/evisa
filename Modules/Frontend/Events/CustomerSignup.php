<?php


namespace Modules\Frontend\Events;


use App\Models\VisaUser;
use Lessgap\Services\EmailService;

class CustomerSignup
{
    public function handle(VisaUser $user)
    {
        app(EmailService::class)->createEmail([
            'data' => [
                'customer' => $user
            ],
            'email_to' => $user->email,
            'reference_class' => get_class($user),
            'reference_key' => $user->getKey()
        ], 'email_template_signup');
    }
}
