<?php


namespace Modules\Admin\Actions\Districts;


use App\Models\Districts;
use Illuminate\Http\Request;

class GetAllAction
{
    public function handle(Request $request)
    {
        $districts = [];
        if ($request->input('country_code') && $request->input('province_code')) {
            $query = Districts::where('country_code', $request->input('country_code'))->where('province_code', $request->input('province_code'));
            $districts = $query->orderBy('code','ASC')->get();
        }
        return $districts;
    }
}
