<?php


namespace Modules\Admin\Actions\Config;

use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();
        foreach ($data as $name=>$value){
            settings()->set($name,is_array($value)?json_encode($value):$value);
        }
        return [
            'result'=>true,
            'message'=>'Update configuration successfully!'
        ];
    }
}
