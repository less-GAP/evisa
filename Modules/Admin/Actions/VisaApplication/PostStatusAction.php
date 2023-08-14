<?php


namespace Modules\Admin\Actions\VisaApplication;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApprovalHistory;
use App\Models\VisaApplicationDocument;
use App\Models\VisaApplicationHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostStatusAction
{
    public function handle(Request $request)
    {

        try {
            VisaApplication::where('id', $request->input('id'))->update([
                'approval_status' =>  $request->input('status'),
                'status' =>  $request->input('status')
            ]);
            $data = [
                'visa_application_id' => $request->input('id')
                , 'user' => auth('admin')->user()->username
                , 'type' => 'approval'
                , 'status' => $request->input('status')
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
