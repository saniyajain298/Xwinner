<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
Route::get('/{pattern?}', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('xwinner/search',[HomeController::class, 'search'])->name('search');
Route::get('xwinner/last_result/{pattern}',[HomeController::class, 'last_result'])->name('last_result');

Route::post('xwinner/search-data', [HomeController::class, 'searchResult'])->name('search-data');


Route::post('xwinner/save', [HomeController::class, 'save'])->name('save');
Route::get('xwinner/remove_last_character/{pattern}', [HomeController::class, 'remove_last_character'])->name('remove_last_character');
