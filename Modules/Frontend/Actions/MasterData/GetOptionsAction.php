<?php


namespace Modules\Frontend\Actions\MasterData;


use App\Models\MasterData;
use Illuminate\Http\Request;

class GetOptionsAction
{
    public function handle(Request $request){
        $listKey = $request->route('listKey');
        $masterData = MasterData::find($listKey);
        if($masterData){
            return $masterData->data;
        }
        return [];
    }
}
