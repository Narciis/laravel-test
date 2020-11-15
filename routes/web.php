<?php

use App\Http\Controllers\HomeController;
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

if (request()->filled('active') || request()->filled('sort') || request()->get('keyword')) {
	Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('throttle:1,0.1');
} else {
	Route::get('/', [HomeController::class, 'index'])->name('home');
}
