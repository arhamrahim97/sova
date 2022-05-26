<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\masterData\akun\AkunController;
use App\Http\Controllers\dashboard\masterData\indikator\IndikatorController;
use App\Http\Controllers\dashboard\masterData\opd\OpdController;
use App\Http\Controllers\dashboard\masterData\wilayah\DesaKelurahanController;
use App\Http\Controllers\dashboard\masterData\wilayah\KecamatanController;
use App\Http\Controllers\dashboard\utama\MonitoringController;
use App\Models\Monitoring;
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

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/monitoring/destroyMonitoring/{id}', [MonitoringController::class, 'destroyMonitoring']);
    Route::put('/monitoring/verifikasi/{id}', [MonitoringController::class, 'verifikasi']);
    Route::post('/monitoring/create', [MonitoringController::class, 'create']);
    Route::resource('/monitoring', MonitoringController::class);
    // Route::match(array('PUT', 'POST'), '/monitoring/create', [MonitoringController::class, 'create']);

    Route::resource('/master-data/opd', OpdController::class);
    Route::resource('/master-data/indikator', IndikatorController::class);
    Route::resource('/master-data/kecamatan', KecamatanController::class);
    Route::resource('master-data/desa-kelurahan/{kecamatan}', DesaKelurahanController::class)->parameters([
        '{kecamatan}' => 'kelurahan'
    ]);
    Route::resource('/master-data/akun', AkunController::class);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
