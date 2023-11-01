<?php


namespace Modules\Admin\Actions\VisaApplication;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApprovalHistory;
use App\Models\VisaApplicationDocument;
use App\Models\VisaApplicationHistory;
use App\Models\VisaCustomerLevel;
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
                $visaApplication = VisaApplication::find($id);
                $visaApplication->update(['status' => 'done']);
                if ($user = $visaApplication->user) {
                    $currentLevel = $user->level;
                    $nextLevel = VisaCustomerLevel::where('min_success_visa_per_month', '>', $currentLevel->min_success_visa_per_month)
                        ->where('status', 'active')
                        ->where('min_success_visa_per_month', '<=', $user->success_visa_number_from_30_days)
                        ->first();
                    if ($nextLevel) {
                        $user->customer_level = $nextLevel->id;
                        $user->save();
                    }
                }
            }
            return 1;

        } catch (\Throwable $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
