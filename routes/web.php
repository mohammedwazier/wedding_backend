<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BukuTamuCT;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['cors'])->group(function () {
    Route::post('/api/v1/insert_buku_tamu', [BukuTamuCT::class, 'InsertBukuTamu']);
    Route::get('/api/v1/get_list_buku/{wedding_code}', [BukuTamuCT::class, 'GetBukuTamu']);
});