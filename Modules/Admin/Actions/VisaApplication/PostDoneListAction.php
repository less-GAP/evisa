<?php


namespace Modules\Admin\Actions\VisaApplication;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApprovalHistory;
use App\Models\VisaApplicationDocument;
use App\Models\VisaApplicationHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PostDoneListAction
{
    public function handle(Request $request)
    {

        try {
            $ids = explode(',', $request->input('id'));
            foreach ($ids as $id) {
                VisaApplication::find($id)->update(['status' => 'done']);
            }
            return 1;

        } catch (\Throwable $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
