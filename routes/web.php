<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DropDownController;
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

Route::get('dropdown',[DropDownController::class,'index']);
Route::get('/api/get-thana-list/{id}', [DropDownController::class,'GetThana'])->name('GetThana');
Route::get('/api/get-area-list/{area_id}',[DropDownController::class,'GetArea'])->name('GetArea');