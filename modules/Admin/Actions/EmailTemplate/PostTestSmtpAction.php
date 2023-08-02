<?php


namespace Modules\Admin\Actions\Config;

use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostTestSmtpAction
{
    public function handle(Request $request)
    {
        try {

            $data = $request->all();
            $config = array(
                'driver' => 'smtp',
                'host' => $data['smtp_server'],
                'port' => $data['smtp_port'],
                'from' => $data['smtp_email_from'],
                'encryption' => $data['smtp_security'],
                'username' => $data['smtp_user'],
                'password' => $data['smtp_password']
            );

            \Config::set('mail', $config);
            \Mail::raw('Test email!', function ($message) use ($data) {
                $message
                    ->from($data['smtp_email_from'])
                    ->to($data['email_to'])
                    ->subject('Test email!');
            });
            return [
                'message' => 'Send test email successfully!'
            ];
        } catch (\Throwable $e) {
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
