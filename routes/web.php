<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MealsController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect',  'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/', [FrontendController::class, 'index'])->name('homepage');
    Route::get('show/section/{slug}', [FrontendController::class,'showSection'])->name('show.section');
    Route::get('show/meal/{slug}', [FrontendController::class,'showMeal'])->name('show.meal');

    Route::name('admin.')->namespace('Admin')->prefix('admin')->group(function(){

        Route::get('dashboard', [AdminController::class, 'index'])->name('home');
        Route::get('change/password', [AdminController::class, 'changePassword'])->name('changePassword');
        Route::post('change/password/post', [AdminController::class, 'changePasswordPost'])->name('changePasswordPost');
        Route::get('settings', [SettingController::class, 'index'])->name('settings');
        Route::post('settings',[SettingController::class,'store'])->name('settings.save');
        Route::get('clear-cache',[SettingController::class,'clearCache'])->name('clear.cache');




    });

    Route::resource('admin/sections', SectionController::class);
    Route::resource('admin/meals', MealsController::class);

    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
      ]);

});




