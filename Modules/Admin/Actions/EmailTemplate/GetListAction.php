<?php


namespace Modules\Admin\Actions\EmailTemplate;


use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {

        $query = EmailTemplate::query();
        if ($search = $request->input('search')) {
            $query->where('email_title', 'like', '%' . $search . '%');
        }
        return $query->paginate($request->input('perPage', 15));
    }
}
