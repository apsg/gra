<?php

use App\Domains\Games\Controllers\GamesController;
use App\Domains\Games\Models\Game;
use App\Domains\Missions\Controllers\MissionsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'missions', 'middleware' => 'auth'], function () {
    Route::get('/', MissionsController::class . '@index')->name('mission.index');
    Route::post('/', MissionsController::class . '@store')->name('mission.store');
    Route::get('/create', MissionsController::class . '@create')->name('mission.create');
    Route::get('/{mission}', MissionsController::class . '@show')->name('mission.edit');
    Route::delete('/{mission}', MissionsController::class . '@delete')->name('mission.delete');
    Route::get('/{mission}/preview', MissionsController::class . '@preview')->name('mission.preview');
});

Route::group(['prefix' => 'games', 'middleware' => 'auth'], function () {
    Route::get('/', GamesController::class . '@index')->name('games.index');
    Route::post('/', GamesController::class . '@store')->name('games.store');
    Route::get('/create', GamesController::class . '@create')
        ->middleware('can:create,' . Game::class)
        ->name('games.create');
    Route::get('/{game}', GamesController::class . '@show')->name('games.edit');
    Route::delete('/{game}', GamesController::class . '@delete')->name('games.delete');
});

Route::get('demo', MissionsController::class . '@demo');

Route::group(['prefix' => 'game', 'middleware' => 'auth'], function () {
    Route::get('/{game}', GamesController::class . '@preview')->name('game.play');
});
