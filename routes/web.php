<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BrmasukController;
use App\Http\Controllers\BrkeluarController;



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

Route::resource('vsiswa', SiswaController::class)->middleware('auth');
// Route::get('/login', [LoginController::class, 'index']);
Route::resource('v_barang', BarangController::class)->middleware('auth');

Route::get('login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class,'authenticate']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');

// Route::post('register', [RegisterController::class, 'store']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::resource('v_kategori', KategoriController::class);

Route::resource('brmasuk', BrmasukController::class)->middleware('auth');
Route::resource('brkeluar', BrkeluarController::class)->middleware('auth');


Route::get('/v_dashboard',[DashboardController::class,'index']);
Route::resource('v_dashboard', DashboardController::class)->middleware('auth');

// Route::get('/demo1',[DemoController::class,'demo1']);
// // Route::get('/hello',[DemoController::class,'hello']);

// Route::get('/sija', function () {
//     return"Produk Kreatif dan Kewirausahaan";
// })->name('pkk');
 
