<?php


namespace Modules\Admin\Actions\Provinces;


use App\Models\Provinces;
use Illuminate\Http\Request;

class GetAllAction
{
    public function handle(Request $request)
    {
        $provinces = [];
        if ($search = $request->input('country_code')) {
            $query = Provinces::where('country_code', $search);
            $provinces = $query->orderBy('code','ASC')->get();
        }
        return $provinces;
    }
}
