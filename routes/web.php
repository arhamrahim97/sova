<?php

use App\Http\Controllers\dashboard\masterData\akun\AkunController;
use App\Http\Controllers\dashboard\masterData\indikator\IndikatorController;
use App\Http\Controllers\dashboard\masterData\opd\OpdController;
use App\Http\Controllers\dashboard\masterData\wilayah\DesaKelurahanController;
use App\Http\Controllers\dashboard\masterData\wilayah\KecamatanController;
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
    return view('dashboard.pages.login');
});

Route::resource('/master-data/opd', OpdController::class);
Route::resource('/master-data/indikator', IndikatorController::class);
Route::resource('/master-data/kecamatan', KecamatanController::class);
Route::resource('master-data/desa-kelurahan/{kecamatan}', DesaKelurahanController::class)->parameters([
    '{kecamatan}' => 'kelurahan'
]);
Route::resource('/master-data/akun', AkunController::class);
