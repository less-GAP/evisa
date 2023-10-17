<?php

namespace Modules\Admin\Actions\SMS;

use App\Models\SmsHistory;
use Illuminate\Http\Request;
use Throwable;
use Twilio\Rest\Client;
use App\Models\Config;

class PostAction
{

    public function handle(Request $request)
    {

        $lists = $request->input('lists');
        $sms = $request->input('sms');
        try {
            // Send SMS via Twilio
            $sid = settings('twilio_account_sid');
            $token = settings('twilio_auth_token');
            $phone = settings('twilio_phone_number');
            $twilio = new Client($sid, $token);
            if (!empty($lists)) {
                foreach ($lists as $v) {
                    $send = $twilio->messages->create(
                        $v, // to
                        array(
                            "body" => $sms,
                            "from" => $phone
                        )
                    );
                    if (!empty($send)) {
                        SmsHistory::create([
                            'content' => $sms,
                            'phone' => $v,
                            'status' => $send->status,
                            'created_by' => \Auth::guard('admin')->user()->username
                        ]);
                    }
                }
            }

            $output = [
                'code' => 1,
                'message' => 'Update configuration successfully!',
                'result' => [],
            ];

        } catch (Throwable $e) {
            $output = [
                'code' => 0,
                'message' => $e->getMessage(),
                'data' => []
            ];
        }
        return $output;
    }
}
