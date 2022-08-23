<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MealsController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
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

    Route::get('/', function () {
        return view('welcome');
    });

    Route::name('admin.')->namespace('Admin')->prefix('admin')->group(function(){

        Route::get('dashboard', [AdminController::class, 'index'])->name('home');
        Route::get('settings', [SettingController::class, 'index'])->name('settings');
        Route::post('settings',[SettingController::class,'store'])->name('settings.save');
        Route::get('clear-cache',[SettingController::class,'clearCache'])->name('clear.cache');
        //Route::get('sections',[SectionController::class,'index'])->name('sections.index');



    });

    Route::resource('admin/sections', SectionController::class);
    Route::resource('admin/meals', MealsController::class);


});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);
