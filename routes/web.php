<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pasiencontroller;


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

Route::get('/pasien', [pasiencontroller::class, 'index']);
Route::post('/pasien/import_excel', [pasiencontroller::class, 'import']);
Route::resource('pasien', pasiencontroller::class);
