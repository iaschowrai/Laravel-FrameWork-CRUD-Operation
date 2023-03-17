<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\AssetController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\OwnerController;


Route::resource('asset', AssetController::class);
Route::resource('person',PersonController::class);
Route::resource('owner', OwnerController::class);


Route::get('/', function () {
    return view('home');
});
//        ->middleware(['auth']);

Route::get('/asset/index',function(){
    return view('asset/index');
});

Route::get('/person/index',function(){
    return view('person/index');
});

Route::get('/owner/index',function(){
    return view('owner/index');
});