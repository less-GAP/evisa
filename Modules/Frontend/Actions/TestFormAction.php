<?php
namespace Modules\Frontend\Actions;


use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class TestFormAction
{
    public function handle(){


        return view('front::home', [
        ]);
    }
}
