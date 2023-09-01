<?php


namespace Modules\Frontend\Actions\MasterData;


use App\Models\Country;
use App\Models\MasterData;
use Illuminate\Http\Request;

class GetCountryOptionsAction
{
    public function handle(Request $request){
        return  Country::where('status','active')->get();
    }
}
