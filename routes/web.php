<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\TwilioController;

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
    //return view('welcome');
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('clients', [ClientController::class, 'showClients'])->name('clients');
Route::get('clients/{id}', [ClientController::class, 'showClientRecord']);
Route::post('clients/processes', [ClientController::class, 'getClientProcesses']);

Route::get('labs', [LabController::class, 'showLabs'])->name('labs');
Route::post('labs/save', [LabController::class, 'saveLab']);

Route::get('twilio/test', [TwilioController::class, 'sandboxMessage']);
