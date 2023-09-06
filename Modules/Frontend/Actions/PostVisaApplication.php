<?php

namespace Modules\Frontend\Actions;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApplicant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostVisaApplication
{
    public function handle(Request $request)
    {
        $visaData = $request->all();
        $visaData['est_delivery_time'] = $visaData['due_date'];
        $visaData['status'] = 'pending-preview';
        $visaData['payment_status'] = 'waiting';
        $visaData['user_id'] = auth('frontend')->user() ? auth('frontend')->user()->id : null;
        $visaApplication = VisaApplication::create($visaData);
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
        return $visaApplication;
    }
}
