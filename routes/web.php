<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\TahunAjarController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AnggotaKelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaiEkskulController;
use App\Http\Controllers\NilaiSikapController;
use App\Http\Controllers\NilaiKesehatanController;
use App\Http\Controllers\NilaiProporsiController;
use App\Http\Controllers\PrestasiController;

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PangkatGolonganController;
use App\Http\Controllers\UnitKerjaController;

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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('edit/{user}', [Usercontroller::class, 'editProfile'])->name('edit');
        Route::patch('update/{user}', [Usercontroller::class, 'updateProfile'])->name('update');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{level?}', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'jabatan', 'as' => 'jabatan.'], function () {
        Route::get('/', [JabatanController::class, 'index'])->name('index');
        Route::get('create', [JabatanController::class, 'create'])->name('create');
        Route::post('store', [JabatanController::class, 'store'])->name('store');
        Route::get('edit/{jabatan}', [JabatanController::class, 'edit'])->name('edit');
        Route::patch('update/{jabatan}', [JabatanController::class, 'update'])->name('update');
        Route::delete('destroy/{jabatan}', [JabatanController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [JabatanController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'unit_kerja', 'as' => 'unit_kerja.'], function () {
        Route::get('/', [UnitKerjaController::class, 'index'])->name('index');
        Route::get('create', [UnitKerjaController::class, 'create'])->name('create');
        Route::post('store', [UnitKerjaController::class, 'store'])->name('store');
        Route::get('edit/{unit_kerja}', [UnitKerjaController::class, 'edit'])->name('edit');
        Route::patch('update/{unit_kerja}', [UnitKerjaController::class, 'update'])->name('update');
        Route::delete('destroy/{unit_kerja}', [UnitKerjaController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [UnitKerjaController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'pangkat_golongan', 'as' => 'pangkat_golongan.'], function () {
        Route::get('/', [PangkatGolonganController::class, 'index'])->name('index');
        Route::get('create', [PangkatGolonganController::class, 'create'])->name('create');
        Route::post('store', [PangkatGolonganController::class, 'store'])->name('store');
        Route::get('edit/{pangkat_golongan}', [PangkatGolonganController::class, 'edit'])->name('edit');
        Route::patch('update/{pangkat_golongan}', [PangkatGolonganController::class, 'update'])->name('update');
        Route::delete('destroy/{pangkat_golongan}', [PangkatGolonganController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [PangkatGolonganController::class, 'datatable'])->name('datatable');
    });

});
