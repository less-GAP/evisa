<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Actions\CheckoutVisaApplication;
use Modules\Frontend\Actions\PackageDetailPage;
use Modules\Frontend\Actions\PostVisaApplication;
use Modules\Frontend\Actions\TestFormAction;


Route::middleware(['splade'])->group(function () {
    Route::view('/',  'Frontend::home')->name('home');
    Route::view('/apply',  'Frontend::apply')->name('apply');
    Route::get('/checkout',  CheckoutVisaApplication::class.'@handle')->name('checkout');
    Route::post('/visa-application', PostVisaApplication::class.'@handle')->name('visa-application');

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
