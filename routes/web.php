<?php

use App\Http\Controllers\LinkController;
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

Route::get('/404', function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/', [LinkController::class, 'createForm'])->name('create.form');

Route::post('/create', [LinkController::class, 'store'])->name('links.store');

Route::get('/{token}', [LinkController::class, 'redirect'])->name('redirect');
