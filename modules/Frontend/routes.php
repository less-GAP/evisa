<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Actions\PackageDetailPage;
use Modules\Frontend\Actions\TestFormAction;
use Modules\Frontend\Actions\HomeAction;
use Modules\Frontend\Actions\RegistrationFormAction;


Route::middleware(['splade'])->group(function () {
    Route::get('/', HomeAction::class . '@handle')->name('home');
    Route::get('/product/{slug}', PackageDetailPage::class . '@handle')->name('product');
    Route::get('/registration/{ref_code}', RegistrationFormAction::class . '@handle')->name('registration');


    Route::get('/docs', fn() => view('docs'))->name('docs');

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
