<?php


namespace App\Services;

use App\Models\SquareCustomer;
use App\Models\VisaApplication;
use Carbon\Carbon;
use Square\Models\Builders\CreateCustomerRequestBuilder;
use Square\Models\Builders\CreateInvoiceRequestBuilder;
use Square\Models\Builders\CreateOrderRequestBuilder;
use Square\Models\Builders\CreatePaymentLinkRequestBuilder;
use Square\Models\Builders\InvoiceAcceptedPaymentMethodsBuilder;
use Square\Models\Builders\InvoiceBuilder;
use Square\Models\Builders\InvoicePaymentReminderBuilder;
use Square\Models\Builders\InvoicePaymentRequestBuilder;
use Square\Models\Builders\InvoiceRecipientBuilder;
use Square\Models\Builders\MoneyBuilder;
use Square\Models\Builders\OrderBuilder;
use Square\Models\Builders\OrderLineItemBuilder;
use Square\Models\Builders\PublishInvoiceRequestBuilder;
use Square\Models\Builders\QuickPayBuilder;
use Square\Models\CreatePaymentRequest;
use Square\Models\Currency;
use Square\Models\InvoiceAutomaticPaymentSource;
use Square\Models\InvoiceDeliveryMethod;
use Square\Models\InvoiceRequestType;
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

    public function makePayment($token, VisaApplication $visaApplication)
    {
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
        $create_payment_request = new CreatePaymentRequest($token, uniqid());
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
            $visaApplication->square_order_id = $createPaymentLinkResponse->getPaymentLink()->getOrderId();
            $visaApplication->square_payment_url = $createPaymentLinkResponse->getPaymentLink()->getUrl();
            $visaApplication->save();
            return $createPaymentLinkResponse;
        } else {
            $errors = $apiResponse->getErrors();
        }
        return $errors;
    }

    public function getSquarePaymentUrl(VisaApplication $visaApplication)
    {
        if ($visaApplication->square_payment_url) {
            return $visaApplication->square_payment_url;
        }
        $this->createInvoice($visaApplication);
        return $visaApplication->fresh()->square_payment_url;
    }

    public function createInvoice(VisaApplication $visaApplication)
    {

        if (!$visaApplication->square_order_id) {
            $order = $this->createOrder($visaApplication);
            $visaApplication->square_order_id = $order->getId();
            $visaApplication->save();
        }
        $visaApplication = $visaApplication->fresh();
        $invoicesApi = $this->client()->getInvoicesApi();
        $body = CreateInvoiceRequestBuilder::init(
            InvoiceBuilder::init()
                ->locationId(settings('square_location_id'))
                ->orderId($visaApplication->square_order_id)
                ->primaryRecipient(
                    InvoiceRecipientBuilder::init()
                        ->customerId($visaApplication->square_customer_id)
                        ->build()
                )
                ->paymentRequests(
                    [
                        InvoicePaymentRequestBuilder::init()
                            ->requestType(InvoiceRequestType::BALANCE)
                            ->dueDate(Carbon::now()->addDays(7)->format('Y-m-d'))
                            ->tippingEnabled(false)
                            ->automaticPaymentSource(InvoiceAutomaticPaymentSource::NONE)
                            ->reminders(
                                [
                                    InvoicePaymentReminderBuilder::init()
                                        ->relativeScheduledDays(-1)
                                        ->message('Your invoice is due tomorrow')
                                        ->build()
                                ]
                            )
                            ->build()
                    ]
                )
                ->deliveryMethod(InvoiceDeliveryMethod::EMAIL)
                ->invoiceNumber($visaApplication->order_no)
                ->title('Payment for Visa Application')
                ->description('Payment for Visa Application')
                ->acceptedPaymentMethods(
                    InvoiceAcceptedPaymentMethodsBuilder::init()
                        ->card(true)
                        ->squareGiftCard(false)
                        ->bankAccount(false)
                        ->buyNowPayLater(true)
                        ->cashAppPay(true)
                        ->build()
                )
                ->customFields(
                    [
//                        InvoiceCustomFieldBuilder::init()
//                            ->label('Event Reference Number')
//                            ->value('Ref. #1234')
//                            ->placement(InvoiceCustomFieldPlacement::ABOVE_LINE_ITEMS)
//                            ->build(),
//                        InvoiceCustomFieldBuilder::init()
//                            ->label('Terms of Service')
//                            ->value('The terms of service are...')
//                            ->placement(InvoiceCustomFieldPlacement::BELOW_LINE_ITEMS)
//                            ->build()
                    ]
                )
                ->saleOrServiceDate($visaApplication->created_at->format('Y-m-d'))
                ->storePaymentMethodEnabled(false)
                ->build()
        )
            ->idempotencyKey($visaApplication->order_no)
            ->build();

        $apiResponse = $invoicesApi->createInvoice($body);

        if ($apiResponse->isSuccess()) {
            $invoice = $apiResponse->getResult()->getInvoice();
            $visaApplication->square_invoice_id = $invoice->getId();
            $visaApplication->save();
            $body = PublishInvoiceRequestBuilder::init(
                0
            )
                ->idempotencyKey($visaApplication->order_no)
                ->build();

            $apiResponse = $invoicesApi->publishInvoice(
                $visaApplication->square_invoice_id,
                $body
            );

            if ($apiResponse->isSuccess()) {
                $publishInvoiceResponse = $apiResponse->getResult();
                $visaApplication->square_payment_url = $publishInvoiceResponse->getInvoice()->getPublicUrl();
                $visaApplication->save();
                return $visaApplication;
            } else {
                throw new \Exception('Publish Invoice Error:' . $visaApplication->square_invoice_id);
            }
        }
        throw new \Exception('Create Invoice Error:' . $visaApplication->order_no);

    }

    public function createCustomer(VisaApplication $visaApplication)
    {
        $squareCustomer = SquareCustomer::where('email', $visaApplication->contact_email)->first();
        if ($squareCustomer) {
            return $squareCustomer;
        }
        $customersApi = $this->client()->getCustomersApi();
        $body = CreateCustomerRequestBuilder::init()
            ->givenName($visaApplication->contact_name)
            ->familyName('')
            ->emailAddress($visaApplication->contact_email)
            ->phoneNumber($visaApplication->contact_phone)
            ->referenceId('')
            ->note('')
            ->build();

        $apiResponse = $customersApi->createCustomer($body);
        if ($apiResponse->isSuccess()) {
            $customerData = $apiResponse->getResult()->getCustomer();
            $squareCustomer = SquareCustomer::create([
                'square_customer_id' => $customerData->getId()
                , 'full_name' => $visaApplication->contact_name
                , 'email' => $visaApplication->contact_email
                , 'phone' => $visaApplication->contact_phone
                , 'country' => $visaApplication->country
            ]);
            return $squareCustomer;
        }
        $errors = $apiResponse->getErrors();
        throw new \Exception('Create Customer Error!', $errors);
    }

    public function createOrder(VisaApplication $visaApplication)
    {
        $ordersApi = $this->client()->getOrdersApi();
        if (!$visaApplication->square_customer_id) {
            $squareCustomer = $this->createCustomer($visaApplication);
            $visaApplication->square_customer_id = $squareCustomer->square_customer_id;
            $visaApplication->save();
        }
        $body = CreateOrderRequestBuilder::init()
            ->order(
                OrderBuilder::init(
                    settings('square_location_id')
                )
                    ->referenceId($visaApplication->id)
                    ->lineItems(
                        [
                            OrderLineItemBuilder::init(
                                '1'
                            )
                                ->name('Visa Application')
                                ->basePriceMoney(
                                    MoneyBuilder::init()
                                        ->amount($visaApplication->total_amount * 100)
                                        ->currency(Currency::USD)
                                        ->build()
                                )
                                ->build()
                        ]
                    )
                    ->build()
            )
            ->idempotencyKey($visaApplication->order_no)
            ->build();

        $apiResponse = $ordersApi->createOrder($body);

        if ($apiResponse->isSuccess()) {
            return $apiResponse->getResult()->getOrder();
        }
        $errors = $apiResponse->getErrors();
        throw new \Exception('Create Order Error!', $errors);
    }

    public function checkPayment(VisaApplication $visaApplication)
    {
        if (!$visaApplication->square_invoice_id) {
            return;
        }
        $invoicesApi = $this->client()->getInvoicesApi();
        $apiResponse = $invoicesApi->getInvoice($visaApplication->square_invoice_id);

        if ($apiResponse->isSuccess()) {
            $visaApplication->payment_status = $apiResponse->getResult()->getInvoice()->getStatus();
            $visaApplication->save();
        } else {
            $errors = $apiResponse->getErrors();
        }

    }
}
