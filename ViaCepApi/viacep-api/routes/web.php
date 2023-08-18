<?php

use App\Http\Controllers\RetrieveCeps;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cep', [RetrieveCeps::class, 'find']);
Route::get('/cep/export', [RetrieveCeps::class, 'exportCsv'])->name('cep.export');
