<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController as GC;
use App\Http\Controllers\KurikulumController as KC;
use App\Http\Controllers\KepsekController as KEC;
use App\Http\Controllers\SupervisorController as SC;
use Illuminate\Routing\RouteGroup;

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
    return redirect('/login');
});
Route::get('/register', function () {
    return redirect('/login');
});

Auth::routes([
    'register'=>false,
    'verify'=>false,
    'reset'=>false,
    'password.request'=>false,
    'password.reset'=>false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::group(['middleware' => 'guru'], function(){
        Route::get('/guru/home', [GC::class, 'jadwal'])->name('guru.home');
        Route::resource('guru', GC::class);
        Route::get('/gr/belum', [GC::class, 'belum'])->name('guru.belum');
        Route::get('/gr/lulus', [GC::class, 'lulus'])->name('guru.lulus');
        Route::get('/gr/tidakLulus', [GC::class, 'tidakLulus'])->name('guru.tidakLulus');
    });

    Route::group(['middleware' => 'kurikulum'], function(){
        Route::get('/kurikulum/home', [KC::class, 'index'])->name('kurikulum.home');
        Route::resource('kurikulum', KC::class);
        Route::get('/kurikulum/jadikan/{id}', [KC::class, 'jadikan'])->name('kurikulum.jadikan');
        Route::get('/kurikulum/batalkan/{id}', [KC::class, 'batalkan'])->name('kurikulum.batalkan');
        Route::get('/krklm/jadwal', [KC::class, 'jadwal'])->name('kurikulum.jadwal');
        Route::get('/krklm/jadwal/create', [KC::class, 'jadwalCreate'])->name('kurikulum.jadwalCreate');
        Route::post('/krklm/jadwal/create/post', [KC::class, 'jadwalPost'])->name('kurikulum.jadwalPost');
        Route::delete('krklm/jadwal/delete/{id}', [KC::class, 'jadwalDelete'])->name('kurikulum.jadwalDelete');
        Route::get('/krklm/guru/dokumen', [KC::class, 'guru'])->name('kurikulum.guru');
        Route::get('/krklm/guru/dokumen/create', [KC::class, 'guruCreate'])->name('kurikulum.guruCreate');
        Route::post('/krklm/guru/dokumen/create/post', [KC::class, 'guruPost'])->name('kurikulum.guruPost');
        Route::get('/krklm/laporan', [KC::class, 'laporan'])->name('kurikulum.laporan');
    });

    Route::group(['middleware' => 'kepsek'], function(){
        Route::get('/kepsek/home', [KEC::class, 'index'])->name('kepsek.home');
        Route::get('/kepsek/laporan', [KEC::class, 'laporan'])->name('kepsek.laporan');
    });

    Route::get('/supervisor/home', [SC::class, 'index'])->name('supervisor.home');
    Route::get('/supervisor/dokumen', [SC::class, 'dokumen'])->name('supervisor.dokumen');
    Route::patch('/supervisor/lulus/{id}', [SC::class, 'lulus'])->name('supervisor.lulus');
    Route::patch('/supervisor/tidakLulus/{id}', [SC::class, 'tidakLulus'])->name('supervisor.tidakLulus');
    Route::get('/supervisor/batal/{id}', [SC::class, 'batal'])->name('supervisor.batal');

});
