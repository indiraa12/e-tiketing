<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BandaraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/', function () {
    return view('beranda');
});

Route::get("/login", [LoginController::class, "index"])->name('login');
Route::post("/login", [LoginController::class, "authenticate"]);

Route::get("/register", [RegisterController::class, "register"]);
Route::post("/register", [RegisterController::class, "store"]);

Route::post("/logout", [LoginController::class, "logout"])->middleware("auth");

Route::get("/dashboard", [HomeController::class, "index"]);
Route::post("/dashboard", [HomeController::class, "search"]);

Route::resource("/admin/pengguna", PenggunaController::class);

Route::resource("/admin/type", TypeController::class);
Route::resource("/admin/bandara", BandaraController::class);
Route::resource("/admin/rute", RuteController::class);

Route::resource("/pemesanan", PesananController::class);
