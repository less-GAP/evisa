<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Middleware\AdminIsAuthenticated;
use Modules\Frontend\Actions\Auth\LogoutAction;
use Modules\Frontend\Actions\Auth\PostLoginAction;
use Modules\Frontend\Actions\Auth\PostSignupAction;
use Modules\Frontend\Actions\Auth\SocialAuthAction;
use Modules\Frontend\Actions\CheckoutVisaApplication;
use Modules\Frontend\Actions\MyAccount\PostEditProfileAction;
use Modules\Frontend\Actions\MyAccount\PostUpdatePasswordAction;
use Modules\Frontend\Actions\PackageDetailPage;
use Modules\Frontend\Actions\PostVisaApplication;
use Modules\Frontend\Actions\SubmitFormAction;
use Modules\Frontend\Actions\TestFormAction;

Route::get('/master-data/country/options', \Modules\Frontend\Actions\MasterData\GetCountryOptionsAction::class . '@handle');
Route::get('/master-data/visa-processing-time/options', \Modules\Frontend\Actions\MasterData\GetProcessingTimeOptionsAction::class . '@handle');
Route::get('/master-data/{listKey}/options', \Modules\Frontend\Actions\MasterData\GetOptionsAction::class . '@handle');
Route::middleware([AdminIsAuthenticated::class])->group(function () {
    Route::view('/preview', 'front::preview')->name('preview');
});
Route::middleware(['splade'])->group(function () {

    Route::view('/', 'front::home')->name('home');
    Route::post('/form', SubmitFormAction::class . '@handle');
    Route::post('/auth/{provider}', SocialAuthAction::class . '@handle');

    Route::view('/my-account', 'front::my-account.dashboard')->name('my-account');
    Route::view('/my-account/my-visa', 'front::my-account.my-visa')->name('my-visa');
    Route::post('/my-account/edit-profile', PostEditProfileAction::class . '@handle')->name('post-edit-profile');
    Route::post('/my-account/password', PostUpdatePasswordAction::class . '@handle')->name('post-edit-password');
    Route::view('/my-account/edit-profile', 'front::my-account.edit-profile')->name('edit-profile');

    Route::view('/login', 'front::login')->name('login');
    Route::view('/signup', 'front::signup')->name('signup');
    Route::get('/logout', LogoutAction::class . '@handle')->name('logout');
    Route::post('/login', PostLoginAction::class . '@handle')->name('post-login');
    Route::post('/signup', PostSignupAction::class . '@handle')->name('post-signup');
    Route::view('/forgot', 'front::forgot')->name('forgot');
    Route::view('/apply', 'front::apply')->name('apply');
    Route::get('/checkout', CheckoutVisaApplication::class . '@handle')->name('checkout');
    Route::post('/visa-application', PostVisaApplication::class . '@handle')->name('visa-application');

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
    Route::view('/post/{slug}', 'front::post')->name('post');
    Route::view('/{slug}', 'front::page')->name('page');

});
