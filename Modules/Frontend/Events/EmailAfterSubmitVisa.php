<?php


namespace Modules\Frontend\Events;


use App\Models\VisaApplication;
use Lessgap\Services\EmailService;

class EmailAfterSubmitVisa
{
    public function handle(VisaApplication $visaApplication)
    {
        app(EmailService::class)->createEmail([
            'data' => [
                'visaApplication' => $visaApplication
                ,'customer' => $visaApplication->user
            ],
            'email_to' => $visaApplication->contact_email,
            'reference_class' => get_class($visaApplication),
            'reference_key' => $visaApplication->getKey()
        ], 'email_template_thank_you');
    }
}
