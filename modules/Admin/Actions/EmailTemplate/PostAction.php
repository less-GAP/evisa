<?php


namespace Modules\Admin\Actions\EmailTemplate;

use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();
        $insertData = [];
        foreach ($data as $name=>$value){
            $insertData[]=[
                'name'=>$name,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                'value'=>$value
            ];
        }
        return [
            'result'=>Config::upsert($insertData,['name']),
            'message'=>'Update configuration successfully!'
        ];
    }
}
