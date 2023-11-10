<?php

namespace App\Console\Commands;

use App\Models\VisaApplication;
use App\Services\PaymentService;
use Illuminate\Console\Command;

class CheckPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $visaApplications = VisaApplication::where('payment_status','<>', 'PAID')
            ->where('status', '<>', 'rejected')
            ->whereNotNull('square_invoice_id')
            ->get();
        foreach ($visaApplications as $visaApplication) {
            app(PaymentService::class)->checkPayment($visaApplication);
        }
    }
}
