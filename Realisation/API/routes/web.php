<?php

use App\Http\Controllers\PreparationBriefController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationTacheController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){


Route::resource('task', PreparationTacheController::class);
Route::get('/',[PreparationTacheController::class,'index'])->name('index');
Route::get('exportexcel',[PreparationTacheController::class,'exportexcel'])->name('exportexcel');
Route::post('importexcel',[PreparationTacheController::class,'importexcel'])->name('importexcel');
route::get('/filter_bief',[PreparationTacheController::class,'filter_bief'])->name('filter_bief');
route::get('/searchtache',[PreparationTacheController::class,'search_tache'])->name('searchtache');
route::get('/generatepdf',[PreparationTacheController::class,'generatepdf'])->name('generate');

Route::resource('brief', PreparationBriefController::class);
route::get('/generatepdf',[PreparationBriefController::class,'generatepdf'])->name('generate');
Route::get('exportexcel',[PreparationBriefController::class,'exportexcel'])->name('exportexcel');
Route::post('importexcel',[PreparationBriefController::class,'importexcel'])->name('importexcel');
route::get('/searchbrief',[PreparationBriefController::class,'search_brief'])->name('searchbriefs');

});
