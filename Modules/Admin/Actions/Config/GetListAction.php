<?php


namespace Modules\Admin\Actions\Config;


use App\Models\Config;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $names = $request->input('names', []);
        return settings()->get($names);
    }
}
