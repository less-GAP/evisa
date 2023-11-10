<?php

namespace Modules\Frontend\Actions;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApplicant;
use App\Models\VisaUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostVisaApplication
{
    public function handle(Request $request)
    {
        try {

            $visaData = $request->all();
            $visaData['est_delivery_time'] = $visaData['due_date'];
            $visaData['status'] = 'pending-preview';
            $visaData['level_id'] = current_level_id();
            $visaData['payment_status'] = 'UNPAID';
            $visaData['user_id'] = auth('frontend')->user() ? auth('frontend')->user()->id : null;

            $visaApplication = VisaApplication::create($visaData);
            if (!$visaData['user_id'] && !$user = VisaUser::where('email', $visaData['contact_email'])->first()) {
                $password = \Str::random(8);
                $user = VisaUser::updateOrCreate([
                    'email' => $visaApplication->contact_email
                ],
                    [
                        'full_name' => $visaApplication->contact_name,
                        'password' => \Hash::make($password),
                        'require_change_password' => 1,
                        'email_verified_at' => Carbon::now()
                    ]
                );
                lessgap_handle_event('after_customer_auto_signup', ['user' => $user, 'password' => $password]);

            }
            $documents = $request->input('applicants', []);
            for ($i = 0; $i < $visaApplication->number_of_visa; $i++) {
                $data = $documents[$i];
                $data['visa_application_id'] = $visaApplication->id;
                if (!empty($data['passport_photo'])) {
                    $path = 'passport_photo_' . uniqid() . '.jpg';
                    \Storage::disk('upload')->put($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['passport_photo'])));
                    $data['passport_photo'] = 'upload/' . $path;
                }
                if (!empty($data['profile_photo'])) {
                    $path = 'profile_photo_' . uniqid() . '.jpg';
                    \Storage::disk('upload')->put($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['profile_photo'])));
                    $data['profile_photo'] = 'upload/' . $path;
                }
                VisaApplicationApplicant::create($data);
            }
            $request->session()->put('currentVisa', $visaApplication);
            lessgap_handle_event('after_visa_submitted', ['visaApplication' => $visaApplication]);
            if (!empty($visaData['services'])) {
                $visaApplication->saveServices($visaData['services']);
            }
            return $visaApplication;
        } catch (\Throwable $exception) {
            \Log::error($exception);
            if (env('APP_DEBUG')) {
                throw $exception;
            }
            throw new \Exception('System Error!');
        }
    }
}
