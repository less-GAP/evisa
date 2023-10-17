<?php
namespace Modules\Frontend\Actions;


use Core\Request\Request;
use ProtoneMedia\Splade\Facades\Toast;

class SubmitFormAction
{
    public function handle(Request $request){

        Toast::message('Send message successfully!')
            ->success()
            ->centerTop();
        return redirect()->back();
    }
}
