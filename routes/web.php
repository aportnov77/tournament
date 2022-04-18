<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\TournamentController::class, 'index']);
Route::post('/tournament/create', [\App\Http\Controllers\TournamentController::class, 'create']);
Route::get('/tournament/{uuid}', [\App\Http\Controllers\TournamentController::class, 'get']);
Route::get('/tournament/result/{uuid}', [\App\Http\Controllers\TournamentController::class, 'result']);

Route::post('/tournament/fixtures/{uuid}', [\App\Http\Controllers\TournamentController::class, 'createFixtures']);
Route::get('/tournament/fixtures/{uuid}', [\App\Http\Controllers\TournamentController::class, 'getFixtures']);

Route::post('/tournament/playAll/{uuid}', [\App\Http\Controllers\TournamentController::class, 'playAll']);

Route::get('/tournament/result/{$uuid}', [\App\Http\Controllers\TournamentController::class, 'resultAll']);

Route::get('/tournament/teams', [\App\Http\Controllers\TournamentController::class, 'getTeams']);


