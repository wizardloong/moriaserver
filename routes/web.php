<?php

use App\Http\Controllers\Home\CharactersController;
use App\Http\Controllers\Home\RoleController;
use App\Http\Controllers\Home\UserController;
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

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::get('home/', [HomeController::class, 'index'])->name('home');
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'home',
    'as' => 'home.'
], function () {
    Route::resource('characters', CharactersController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
