<?php


namespace Modules\Admin\Actions\EmailTemplate;

use App\Models\Config;
use App\Models\EmailTemplate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = \Auth::user()->username;
        $data['updated_by'] = \Auth::user()->username;
        $result = EmailTemplate::updateOrCreate(['id'=>$request->input('id')],$data);
        return [
            'result' =>  $result,
            'message' =>  $request->input('id')?'Update Email Template Successfully!':'Create  Email Template Successfully!'
        ];
    }
}
