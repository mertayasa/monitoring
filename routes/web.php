<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PangkatGolonganController;
use App\Http\Controllers\UnitKerjaController;

use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TargetSkpController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SubKegiatanController;
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
        Route::get('edit/{level}/{user}', [Usercontroller::class, 'editProfile'])->name('edit');
        Route::patch('update/{level}/{user}', [Usercontroller::class, 'updateProfile'])->name('update');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/{level}', [UserController::class, 'index'])->name('index');
        Route::get('create/{level}', [UserController::class, 'create'])->name('create');
        Route::post('store/{level}', [UserController::class, 'store'])->name('store');
        Route::get('edit/{level}/{user}', [UserController::class, 'edit'])->name('edit');
        Route::get('show/{level}/{user}', [UserController::class, 'show'])->name('show');
        Route::patch('update/{level}/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{level}/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{level?}', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'penilaian', 'as' => 'penilaian.'], function () {
        Route::get('/', [PenilaianController::class, 'index'])->name('index');
        Route::get('create', [PenilaianController::class, 'create'])->name('create');
        Route::post('store', [PenilaianController::class, 'store'])->name('store');
        
        Route::get('edit/{nilai_skp}', [PenilaianController::class, 'edit'])->name('edit');
        Route::patch('update/{nilai_skp}', [PenilaianController::class, 'update'])->name('update');
        
        Route::get('edit-kegiatan/{nilai_skp}', [PenilaianController::class, 'editKegiatan'])->name('edit_kegiatan');
        Route::post('store-kegiatan/{nilai_skp}', [PenilaianController::class, 'storeKegiatan'])->name('store_kegiatan');
        Route::patch('update-kegiatan/{nilai_skp}/{kegiatan_skp}', [PenilaianController::class, 'updateKegiatan'])->name('update_kegiatan');
        Route::delete('destroy-kegiatan/{nilai_skp}/{kegiatan_skp}', [PenilaianController::class, 'destroyKegiatan'])->name('destroy_kegiatan');
        
        Route::post('store-tugas-tambahan/{nilai_skp}', [PenilaianController::class, 'storeTugasTambahan'])->name('store_tugas_tambahan');
        Route::patch('update-tugas-tambahan/{nilai_skp}/{tugas_tambahan}', [PenilaianController::class, 'updateTugasTambahan'])->name('update_tugas_tambahan');
        Route::delete('destroy-tugas-tambahan/{nilai_skp}/{tugas_tambahan}', [PenilaianController::class, 'destroyTugasTambahan'])->name('destroy_tugas_tambahan');
        
        Route::get('edit-prilaku/{nilai_skp}', [PenilaianController::class, 'editPrilaku'])->name('edit_prilaku');
        Route::post('update-prilaku/{nilai_skp}', [PenilaianController::class, 'updatePrilaku'])->name('update_prilaku');
        
        Route::get('edit-nilai/{nilai_skp}', [PenilaianController::class, 'editNilai'])->name('edit_nilai');
        Route::patch('update-nilai/{nilai_skp}', [PenilaianController::class, 'updateNilai'])->name('update_nilai');
        
        Route::delete('destroy/{nilai_skp}', [PenilaianController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [PenilaianController::class, 'datatable'])->name('datatable');

        Route::get('show/{nilai_skp}', [PenilaianController::class, 'show'])->name('show');
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

        Route::group(['prefix' => 'pengumuman', 'as' => 'pengumuman.'], function () {
        Route::get('/', [PengumumanController::class, 'index'])->name('index');
        Route::get('create', [PengumumanController::class, 'create'])->name('create');
        Route::post('store', [PengumumanController::class, 'store'])->name('store');
        Route::get('edit/{pengumuman}', [PengumumanController::class, 'edit'])->name('edit');
        Route::get('show/{pengumuman}', [PengumumanController::class, 'show'])->name('show');
        Route::patch('update/{pengumuman}', [PengumumanController::class, 'update'])->name('update');
        Route::delete('destroy/{pengumuman}', [PengumumanController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [PengumumanController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'target_skp', 'as' => 'target_skp.'], function () {
        Route::get('/', [TargetSkpController::class, 'index'])->name('index');
        Route::get('create', [TargetSkpController::class, 'create'])->name('create');
        Route::post('store', [TargetSkpController::class, 'store'])->name('store');
        Route::get('edit/{target_skp}', [TargetSkpController::class, 'edit'])->name('edit');
        Route::get('show/{target_skp}', [TargetSkpController::class, 'show'])->name('show');
        Route::patch('update/{target_skp}', [TargetSkpController::class, 'update'])->name('update');
        Route::delete('destroy/{target_skp}', [TargetSkpController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [TargetSkpController::class, 'datatable'])->name('datatable');
    });
    
    Route::group(['prefix' => 'kegiatan', 'as' => 'kegiatan.'], function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('index');
        Route::get('create', [KegiatanController::class, 'create'])->name('create');
        Route::post('store', [KegiatanController::class, 'store'])->name('store');
        Route::get('edit/{kegiatan}', [KegiatanController::class, 'edit'])->name('edit');
        Route::get('show/{kegiatan}', [KegiatanController::class, 'show'])->name('show');
        Route::patch('update/{kegiatan}', [KegiatanController::class, 'update'])->name('update');
        Route::delete('destroy/{kegiatan}', [KegiatanController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [KegiatanController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'kalender', 'as' => 'kalender.'], function () {
        Route::get('/', [KegiatanController::class, 'kalender'])->name('index');
    });

        Route::group(['prefix' => 'sub_kegiatan', 'as' => 'sub_kegiatan.'], function () {
        Route::get('/', [SubKegiatanController::class, 'index'])->name('index');
        Route::get('create', [SubKegiatanController::class, 'create'])->name('create');
        Route::post('store', [SubKegiatanController::class, 'store'])->name('store');
        Route::get('edit/{sub_kegiatan}', [SubKegiatanController::class, 'edit'])->name('edit');
        Route::get('show/{sub_kegiatan}', [SubKegiatanController::class, 'show'])->name('show');
        Route::patch('update/{sub_kegiatan}', [SubKegiatanController::class, 'update'])->name('update');
        Route::delete('destroy/{sub_kegiatan}', [SubKegiatanController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [SubKegiatanController::class, 'datatable'])->name('datatable');
    });

});
