<?php
namespace Modules\Frontend\Actions;


use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class PackageDetailPage
{
    public function handle(){
        $form = SpladeForm::make()
            ->fields([
                Input::make('name')->label('User Name'),
                Password::make('password')->label('Password'),
                Submit::make()->label('Create'),
            ]);

        return view('Frontend::package_detail', [
            'form' => $form,
        ]);
    }
}
