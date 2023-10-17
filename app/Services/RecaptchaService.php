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
        $secret = settings('recaptcha_secret_key');
        return new \ReCaptcha\ReCaptcha($secret);

    }

    public function verify($gRecaptchaResponse, $ip)
    {
        $recaptcha = $this->recaptcha();
        $resp = $recaptcha->setScoreThreshold(0.5)->verify($gRecaptchaResponse, $ip);
        if ($resp->isSuccess()) {
            return $resp;
        } else {
            throw new \Exception('Verify failed!');

        }
    }
}
