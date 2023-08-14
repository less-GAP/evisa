<?php


namespace Modules\Admin\Actions\VisaApplication;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApprovalHistory;
use App\Models\VisaApplicationDocument;
use App\Models\VisaApplicationHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostAssignAction
{
    public function handle(Request $request)
    {

        try {
            $visaApplication = VisaApplication::find($request->input('id'));
            $syncData =[];
            foreach ($request->input('assignees') as $username){
                $syncData[$username] = [
                    'created_by'=>auth('admin')->user()->username,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ];
            }
            $visaApplication->assignees()->sync($syncData);
            $visaApplication->update(
                ['status' => 'assigned']
            );

            $data = [
                'visa_application_id' => $request->input('id')
                , 'user' => auth('admin')->user()->username
                , 'type' => 'assign'
                , 'status' => $request->input('status')
                , 'data' => $request->input('assignees')
                , 'comment' => $request->input('comment')
            ];
            $history = VisaApplicationHistory::create($data);

            return response([
                'result' => $history,
                'message' => 'Success!'
            ]);
        } catch (\Throwable $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
