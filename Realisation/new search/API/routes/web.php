<?php

use App\Http\Controllers\BriefController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationTacheController;
use App\Http\Livewire\Counter;
use App\Models\PreparationTache;
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

// Route::get('/exemple',function(){
//     $users=PreparationTache::latest();
//     if(request()->has('searche') && !empty(request()->input('searche'))) {
//         $users->where('Nom_tache','Like','%'.request()->input('searche').'%');
        
//     }
//     $users=$users->paginate(3)->withQueryString();
//     return view('exemple',compact('users'));
// })->name('exemple');
// route::get('/aa',[Counter::class,'render'])->name('aa');
// route::get('/aa',function(){
//     return view('test');
// });
// Route::get('exemple', [BriefController::class,'index'])->name('exemple');
// Route::get('search', [BriefController::class,'search'])->name('search');

// Route::get('/pagination', 'BriefController@index');

// Route::get('/pagination/fetch_data', 'BriefController@fetch_data');

Route::get('pagination', [BriefController::class,'index'])->name('pagination');
Route::get('/pagination/fetch_data', [BriefController::class,'fetch_data'])->name('/pagination/fetch_data');
});
