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
    });

    Route::group(['middleware' => 'kepsek'], function(){
        Route::get('/kepsek/home', [KEC::class, 'index'])->name('kepsek.home');
    });

    Route::get('/supervisor/home', [SC::class, 'index'])->name('supervisor.home');

});
