<?php
namespace Modules\Frontend\Actions;


use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class SubmitFormAction
{
    public function handle(){
        Toast::message('Send message successfully!')
            ->success()
            ->centerTop();
        return redirect()->back();
    }
}
