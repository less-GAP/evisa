<?php


namespace App\Services;

use App\Models\Invoice;
use App\Models\VisaApplication;
use Carbon\Carbon;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalPaymentService
{
    public function provider()
    {
        $config = [
            'mode' => settings('payment_paypal_mode', 'sandbox'),
            'live' => [
                'client_id' => settings('paypal_client_id'),
                'client_secret' => settings('paypal_client_secret'),
                'app_id' => settings('paypal_app_id', 'APP-80W284485P519543T'),
            ], 'sandbox' => [
                'client_id' => settings('paypal_client_id'),
                'client_secret' => settings('paypal_client_secret'),
                'app_id' => settings('paypal_app_id', 'APP-80W284485P519543T'),
            ],
            'payment_action' => 'Sale',
            'currency' => 'USD',
            'notify_url' => url('/paypal/notify'),
            'locale' => 'en_US',
            'validate_ssl' => true,
        ];
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials($config);
        $provider->getAccessToken();
        return $provider;
    }

    public function createInvoice(VisaApplication $visaApplication)
    {
        $data = [
            'detail' => [
                'invoice_number' => 'INV-' . $visaApplication->order_no
                , 'reference' => $visaApplication->order_no
                , 'invoice_date' => Carbon::now()->format('Y-m-d')
                , 'currency_code' => 'USD'
                , 'note' => 'Payment for evisa application.'
                , 'term' => 'No refunds after 30 days.'
                , 'memo' => ''
                , 'payment_term' => [
                    'due_date' => $visaApplication->date_arrival->format('Y-m-d')
                ]
            ],
            'primary_recipients' => [
                [
                    'billing_info' => [
                        'name' => [
                            'given_name' => $visaApplication->contact_name
                            , 'surname' => ''
                        ],
                        'email_address' => $visaApplication->contact_email
                    ]
                ]
            ],
            'items' => [
                [
                    'name' => 'Visa Application'
                    , 'description' => 'Visa Application'
                    , 'quantity' => 1
                    , 'unit_amount' => [
                    'currency_code' => 'USD'
                    , 'value' => $visaApplication->total_amount
                ],
                    'unit_of_measure' => 'QUANTITY'
                ]
            ]
        ];
        $provider = $this->provider();
        $invoice = $provider->createInvoice($data);
        $appInvoice = Invoice::create([
            'payment_gateway' => 'paypal'
            , 'type' => 'evisa_sevice'
            , 'invoice_id' => $invoice->getId()
            , 'order_id' => ''
            , 'customer_id' => ''
            , 'status' => 'DRAFT'
            , 'class' => VisaApplication::class
            , 'class_key' => $visaApplication->id
        ]);

        $invoice_no = 'INV-' . $visaApplication->order_no;
        $invoice_no = 'INV2-QFVY-PXP2-JW2M-J28L';
        $subject = "Payment Evisa Application #" . $invoice_no;

        $note = "Please pay before the due date to avoid incurring late payment charges which will be adjusted in the next bill generated.";

        $emails = [$visaApplication->contact_email];
        $status = $provider->sendInvoice($invoice_no, $subject, $note, true, true, $emails);
        dd($status);
        return $status;
    }
}
