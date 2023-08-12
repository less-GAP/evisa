<?php


namespace Modules\Admin\Actions\Config;


use App\Models\Config;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {

        $names = $request->input('names', []);
        $query = Config::whereIn('name',  $names);
        return $query->get()->pluck('value', 'name');
    }
}
