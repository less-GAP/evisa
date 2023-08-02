<?php


namespace Modules\Admin\Actions\EmailTemplate;


use Illuminate\Http\Request;

class DeleteAction
{
    public function handle(Request $request)
    {

        $query = EmailTemplate::query();
        return [
            'result' =>$query->find($request->route('id'))->delete(),
            'message' => 'Delete Successfully!'
        ];
    }
}
