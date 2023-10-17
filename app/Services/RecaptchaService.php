<?php


namespace App\Services;

use App\Models\VisaApplication;
use Carbon\Carbon;
use Square\Models\Builders\CreatePaymentLinkRequestBuilder;
use Square\Models\Builders\MoneyBuilder;
use Square\Models\Builders\QuickPayBuilder;
use Square\Models\CreatePaymentRequest;
use Square\Models\Currency;
use Square\Models\Money;
use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;

class RecaptchaService
{
    public function recaptcha()
    {
        $secret = settings('recaptcha_site_key');
        return new \ReCaptcha\ReCaptcha($secret);

    }

    public function verify($gRecaptchaResponse)
    {
        $recaptcha = $this->recaptcha();
        $resp = $recaptcha->verify($gRecaptchaResponse);
        if ($resp->isSuccess()) {
            // Verified!
        } else {
            $errors = $resp->getErrorCodes();
        }
    }
}
