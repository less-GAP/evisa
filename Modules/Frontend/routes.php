<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Actions\Auth\LogoutAction;
use Modules\Frontend\Actions\Auth\PostLoginAction;
use Modules\Frontend\Actions\Auth\PostSignupAction;
use Modules\Frontend\Actions\CheckoutVisaApplication;
use Modules\Frontend\Actions\PackageDetailPage;
use Modules\Frontend\Actions\PostVisaApplication;
use Modules\Frontend\Actions\TestFormAction;

Route::get('/master-data/country/options', \Modules\Frontend\Actions\MasterData\GetCountryOptionsAction::class . '@handle');
Route::get('/master-data/visa-processing-time/options', \Modules\Frontend\Actions\MasterData\GetProcessingTimeOptionsAction::class . '@handle');
Route::get('/master-data/{listKey}/options', \Modules\Frontend\Actions\MasterData\GetOptionsAction::class . '@handle');

Route::middleware(['splade'])->group(function () {
    Route::view('/',  'Frontend::home')->name('home');
    Route::view('/my-account',  'Frontend::profile')->name('my-account');
    Route::view('/login',  'Frontend::login')->name('login');
    Route::view('/signup',  'Frontend::signup')->name('signup');
    Route::get('/logout',  LogoutAction::class.'@handle')->name('logout');
    Route::post('/login',  PostLoginAction::class.'@handle')->name('post-login');
    Route::post('/signup',  PostSignupAction::class.'@handle')->name('post-signup');
    Route::view('/forgot',  'Frontend::forgot')->name('forgot');
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
