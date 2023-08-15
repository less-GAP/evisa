<?php

namespace Modules\Frontend\Actions;


use App\Models\Carts;
use App\Models\Customer;
use App\Models\PackageCourse;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\Splade\Facades\Splade;

class LocationAction
{
    public function provinces(Request $request)
    {
        $provinces = Provinces::where('country_code', 'VN')->get()->toArray();
        return $provinces;
    }

    public function districts(Request $request)
    {
        $districts = [];
        if ($request->route('code')) {
            $districts = Districts::where('country_code', 'VN')
                ->where('province_code', $request->route('code'))
                ->get()->toArray();
        }

        return $districts;
    }

    public function wards(Request $request)
    {
        $wards = [];

        if ($request->route('code')) {
            $code = explode('-', $request->route('code'));
            $wards = Wards::where('country_code', 'VN')
                ->where('province_code', $code[0])
                ->where('district_code', $code[1])
                ->get()->toArray();
        }
        return $wards;
    }
}
