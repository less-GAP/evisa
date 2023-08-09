<?php

namespace Modules\Frontend\Actions;


use App\Models\PackageCourse;
use App\Models\PackageCourseProduct;
use App\Models\Product;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class RegistrationFormAction
{
    public function handle()
    {
        $form = SpladeForm::make()
            ->fields([
                Input::make('name')->label('User Name'),
                Password::make('password')->label('Password'),
                Submit::make()->label('Create'),
            ]);

        return view('Frontend::registration', [
            'form' => $form,
        ]);
    }
}
