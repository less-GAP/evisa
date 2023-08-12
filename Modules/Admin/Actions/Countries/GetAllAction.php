<?php


namespace Modules\Admin\Actions\Countries;


use App\Models\Countries;
use Illuminate\Http\Request;

class GetAllAction
{
    public function handle(Request $request)
    {
        $query = Countries::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%');
        }
        return $query->get();
    }
}
