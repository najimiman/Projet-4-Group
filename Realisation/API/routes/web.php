<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationTacheController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\GroupesApprenantController;

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

Route::resource('apprenant', ApprenantController::class);
route::get('/filter_group',[ApprenantController::class,'filter_group'])->name('filter_group');
route::get('/searchapprenant',[ApprenantController::class,'search_apprenant'])->name('searchapprenant');

Route::get('exportexcelapprenant',[ApprenantController::class,'exportexcel'])->name('exportexcelapprenant');
Route::post('importexcelapprenant',[ApprenantController::class,'importexcel'])->name('importexcelapprenant');
route::get('/generatepdfapprenant',[ApprenantController::class,'generatepdf'])->name('generatepdfapprenant');

Route::resource('assign', GroupesApprenantController::class);
Route::get('/filter_par_group',[GroupesApprenantController::class,'filter_par_group'])->name('filter_par_group');
Route::post('form', [GroupesApprenantController::class,'form_save'])->name('form');


});
