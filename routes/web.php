<?php

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
Route::get('/', 'HomeController@index');
// Route::auth();
// Auth::routes();

// Route::group( ['prefix' => 'admin','as' => 'admin.','middleware' => ['auth']], function() {
Route::group( ['as' => 'admin.','middleware' => ['auth']], function() {

    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/surat-masuk','masterdatasurat\suratmasuk\SuratmasukController@show')->name('suratmasuk');
    Route::get('/surat-keluar','masterdatasurat\suratkeluar\SuratkeluarController@show')->name('suratkeluar');
    Route::get('/surat-pelayanan','masterdatasurat\suratpelayanan\SuratpelayananController@show')->name('suratpelayanan');
    Route::get('/surat-vital','masterdatasurat\suratpelayanan\SuratvitalController@show')->name('suratvital');

    //referensi
    Route::get('/ref-penduduk','referensi\pendudukController@show')->name('refpenduduk');
    Route::get('/ref-suratpelayanan','referensi\suratpelayananController@show')->name('refsuratpelayanan');
    Route::get('/ref-kelengkapansuratpelayanan','referensi\kelengkapansuratpelayananController@show')->name('refkelengkapansuratpelayanan');

    //master user
    Route::get('/master-user','masteruser\LoginUserController@show')->name('masteruser');

    Route::get('/bantuan', 'MainController@bantuan')->name('bantuan');


    
});

require __DIR__.'/auth.php';
