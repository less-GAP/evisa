<?php


namespace Modules\Frontend\Actions\MasterData;


use App\Models\Country;
use App\Models\MasterData;
use App\Models\VisaServices;
use Illuminate\Http\Request;

class GetVisaServiceOptionsAction
{
    public function handle(Request $request){
        return  VisaServices::where('status', 'active')->get();
    }
}
