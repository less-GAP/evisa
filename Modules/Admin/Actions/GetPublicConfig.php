<?php
namespace Modules\Admin\Actions;


use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class GetPublicConfig
{
    public function handle(){
        return settings(['login_google_id','login_google']);
    }
}
