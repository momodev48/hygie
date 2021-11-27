<?php

use App\Http\Controllers\DetailsRdvController;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Route::get('/', [UserController::class, 'index']);




Route::get('/', function () {return view('accueil');});

//Route::get('index', [UserController::class, 'index']);
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    Route::get('listerdv', [RdvController::class, 'index'])->name('data');
});

//Route::get('datardv', [RdvController::class, 'listerdv'])->name('data');

Route::get('datardv/{id}', [RdvController::class, 'show'])->name('show');
Route::patch('datardv/{id}', [RdvController::class, 'updateRdv'])->name('rdv.update');

Route::delete('datardv/{id}', [RdvController::class, 'destroy'])->name('destroy');

Route::middleware(['auth'])->group(function() {
    Route::get('detailsrdv/{id}', [DetailsRdvController::class, 'detailsrdv'])->name('detailsrdv');
});

Route::middleware(['auth'])->group(function() {
    Route::get('calendrier', [CalendrierController::class, 'index'])->name('calendrier');
});


Route::get('accueil', [AccueilController::class, 'index']);
Route::post('add', [AccueilController::class, 'add']);

Route::get('rendezvous/export/', [RdvController::class, 'export'])->name('exporterrdv');

/* Route::get('/logout', [LoginController::class, 'logout']); */

/*Route::get('/rendezvous', function () {
    return view('rendezvous');
})->middleware(['auth'])->name('admin');*/

