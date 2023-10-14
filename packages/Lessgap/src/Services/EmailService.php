<?php


namespace Lessgap\Services;


use App\Jobs\SendEmailJob;
use App\Models\Email;
use App\Models\EmailTemplate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;

class EmailService
{
    protected $config;

    public function __construct()
    {
        $data = settings()->get([
            'smtp_server',
            'smtp_port',
            'smtp_email_from',
            'smtp_security',
            'smtp_user',
            'smtp_password',
        ]);
        $config = array(
            'driver' => 'smtp',
            'host' => $data['smtp_server'],
            'port' => $data['smtp_port'],
            'from' => $data['smtp_email_from'],
            'encryption' => $data['smtp_security'],
            'username' => $data['smtp_user'],
            'password' => $data['smtp_password']
        );
        $this->config = $config;
        \Config::set('mail', $config);
    }

    public function getEmailData($data, $emailTemplateId)
    {
        $template = EmailTemplate::find($emailTemplateId);
        return [
            'template_id' => $emailTemplateId,
            'email_data' => $data['data'] ?? [],
            'email_title' => Blade::render($template->email_title, $data['data'] ?? []),
            'email_to' => $data['email_to'],
            'email_reply_to' => $data['email_reply_to'] ?? $template->email_reply_to,
            'email_cc' => $data['email_cc'] ?? $template->email_cc,
            'email_bcc' => $data['email_bcc'] ?? $template->email_bcc,
            'email_content' => Blade::render($template->email_content, $data['data'] ?? []),
        ];
    }

    public function add($data, $emailTemplateId, $instance = false)
    {
        $email = Email::create($this->getEmailData($data, $emailTemplateId));
        if ($instance) {
            dispatch_sync(new SendEmailJob($email));
        } else {
            dispatch(new SendEmailJob($email));
        }

    }

    public function send(Email $email)
    {
        $config = $this->config;
        try {
            $response = \Mail::raw('', function ($message) use ($email, $config) {
                $message
                    ->from($config['from'])
                    ->to($email['email_to'])
                    ->subject($email['email_title'])
                    ->html($email['email_content']);
            });
            $email->status = 'success';
            $email->sent_at = Carbon::now();
            $email->save();
        } catch (\Throwable $e) {
            \Log::error($e);
            $email->email_response = $e->getMessage();
            $email->status = 'error';
            $email->save();

        }
    }
}
