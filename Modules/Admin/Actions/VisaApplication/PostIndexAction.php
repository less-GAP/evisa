<?php


namespace Modules\Admin\Actions\VisaApplication;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApplicant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostIndexAction
{
    public function handle(Request $request)
    {

        try {
            $visaData = $request->all();
            $visaData['est_delivery_time']=Carbon::now()->addDays(7);
            $visaApplication = VisaApplication::create($visaData);
            $documents = $request->input('applicants', []);
            for ($i = 0; $i < $visaApplication->number_of_visa; $i++) {
                $data = $documents[$i];
                $data['visa_application_id'] = $visaApplication->id;
                VisaApplicationApplicant::create($data);
            }
            return response([
                'result'=>$visaApplication,
                'message' => 'Create Successfully!'
            ]);
        } catch (\Throwable $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
