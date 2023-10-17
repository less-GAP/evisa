<?php


namespace Modules\Admin\Actions\SMS;


use App\Models\SmsHistory;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $post = [];
        $id = $request->route('id');
        if ($id > 0) {
            $post = SmsHistory::where('id', $id)->first();
        }

        return [
            'code' => 1,
            'message' => 'Successfull !',
            'data' => $post
        ];
    }
}
