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

class PaymentService
{
    public function client()
    {

        $client = new SquareClient([
            'accessToken' => settings('square_access_token'),
            'environment' => settings('square_environment'),
        ]);
        return $client;
    }
    public function makePayment($token,VisaApplication  $visaApplication){
        $square_client = $this->client();

        $payments_api = $square_client->getPaymentsApi();
        $money = new Money();
        $money->setAmount(floatval($visaApplication->total_amount));
// Set currency to the currency for the location
        $money->setCurrency(Currency::USD);

// Every payment you process with the SDK must have a unique idempotency key.
// If you're unsure whether a particular payment succeeded, you can reattempt
// it with the same idempotency key without worrying about double charging
// the buyer.
        $create_payment_request = new CreatePaymentRequest($token,uniqid());
        $create_payment_request->setAmountMoney($money);
        $response = $payments_api->createPayment($create_payment_request);

        if ($response->isSuccess()) {
            $visaApplication->payment_status = 'success';
            $visaApplication->square_payment_id = $response->getResult()->getPayment()->getId();
            $visaApplication->square_payment_complete_at = Carbon::now();
            $visaApplication->save();
        } else {
            echo json_encode($response->getErrors());
        }
    }
    public function createPaymentLink(VisaApplication $visaApplication)
    {
        $checkoutApi = $this->client()->getCheckoutApi();
        $body = CreatePaymentLinkRequestBuilder::init()
            ->idempotencyKey($visaApplication->id)
            ->quickPay(
                QuickPayBuilder::init(
                    'Auto Detailing',
                    MoneyBuilder::init()
                        ->amount($visaApplication->total_amount)
                        ->currency(Currency::USD)
                        ->build(),
                    settings('square_location_id')
                )->build()
            )->build();

        $apiResponse = $checkoutApi->createPaymentLink($body);

        if ($apiResponse->isSuccess()) {
            $createPaymentLinkResponse = $apiResponse->getResult();
            $visaApplication->square_order_id=$createPaymentLinkResponse->getPaymentLink()->getOrderId();
            $visaApplication->square_payment_url=$createPaymentLinkResponse->getPaymentLink()->getUrl();
            $visaApplication->save();
            return $createPaymentLinkResponse;
        } else {
            $errors = $apiResponse->getErrors();
        }
        return $errors;
    }
}
