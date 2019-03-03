<?php

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
        return view('login.login');
});

Auth::routes();

//home unused
//Route::get('/home', 'HomeController@index')->name('home');

//beranda
Route::get('/beranda/index', 'BerandaController@index')
        ->middleware('auth')
        ->name('beranda.index');

//pengumuman
Route::get('/pengumuman/index', 'PengumumanController@index')
        ->middleware('auth')
        ->name('pengumuman.index');

//administrator

//arsip
Route::post('/administrator/arsip/create', 'ArsipController@createArsip')
        ->middleware('isAdmin')
        ->name('administrator.arsip.createArsip');

Route::post('/administrator/arsip/getArsip', 'ArsipController@getArsip')
        ->middleware('isAdmin')
        ->name('administrator.arsip.getArsip');

Route::post('/administrator/arsip/update', 'ArsipController@updateArsip')
        ->middleware('isAdmin')
        ->name('administrator.arsip.updateArsip');

Route::post('/administrator/arsip/delete', 'ArsipController@deleteArsip')
        ->middleware('isAdmin')
        ->name('administrator.arsip.deleteArsip');

Route::get('/administrator/arsip/download/{judul}', 'ArsipController@downloadArsip')
        ->middleware('auth')
        ->name('administrator.arsip.downloadArsip');

Route::get('/administrator/arsip', 'ArsipController@administratorArsip')
        ->middleware('isAdmin')
        ->name('administrator.arsip');

Route::get('/arsip/index', 'ArsipController@index')
        ->middleware('auth')
        ->name('arsip.index');
//end arsip

//ruangdiskusi
Route::get('/ruangdiskusi/index', 'RuangdiskusiController@index')
        ->middleware('auth')
        ->name('ruangdiskusi.index');

Route::get('/administrator/ruangdiskusi', 'RuangdiskusiController@administratorRuangdiskusi')
        ->middleware('isAdmin')
        ->name('administrator.ruangdiskusi');

Route::post('/administrator/ruangdiskusi/create', 'RuangdiskusiController@createRuangdiskusi')
        ->middleware('isAdmin')
        ->name('administrator.ruangdiskusi.createRuangdiskusi');

Route::post('/administrator/ruangdiskusi/submitkomentar', 'RuangdiskusiController@submitKomentar')
        ->middleware('auth')
        ->name('administrator.ruangdiskusi.submitkomentar');

Route::get('/ruangdiskusi/{judulruangdiskusi}', 'RuangdiskusiController@gotoRuangdiskusi')
        ->middleware('auth')
        ->name('ruangdiskusi.gotoRuangdiskusi');

Route::post('/administrator/ruangdiskusi/getRuangdiskusi', 'RuangdiskusiController@getRuangdiskusi')
        ->middleware('isAdmin')
        ->name('administrator.ruangdiskusi.getRuangdiskusi');

Route::post('/administrator/ruangdiskusi/update', 'RuangdiskusiController@updateRuangdiskusi')
        ->middleware('isAdmin')
        ->name('administrator.ruangdiskusi.updateRuangdiskusi');

Route::post('/administrator/ruangdiskusi/delete', 'RuangdiskusiController@deleteRuangdiskusi')
        ->middleware('isAdmin')
        ->name('administrator.ruangdiskusi.deleteRuangdiskusi');
//end ruangdiskusi

//detaildiskusi
Route::get('/detaildiskusi/{id}', 'DetaildiskusiController@view')
        ->middleware('auth')
        ->name('detaildiskusi.view');
//end detaildiskusi

//pengumuman
Route::get('/pengumuman/index', 'PengumumanController@index')
        ->middleware('auth')
        ->name('pengumuman.index');

Route::get('/administrator/pengumuman', 'PengumumanController@administratorPengumuman')
        ->middleware('isAdmin')
        ->name('administrator.pengumuman');

Route::post('/administrator/pengumuman/create', 'PengumumanController@createPengumuman')
        ->middleware('isAdmin')
        ->name('administrator.pengumuman.createPengumuman');

Route::get('/administrator/pengumuman/download/{judulpengumuman}', 'PengumumanController@downloadPengumuman')
        ->middleware('auth')
        ->name('administrator.pengumuman.downloadPengumuman');

Route::post('/administrator/pengumuman/getPengumuman', 'PengumumanController@getPengumuman')
        ->middleware('isAdmin')
        ->name('administrator.pengumuman.getPengumuman');

Route::post('/administrator/pengumuman/update', 'PengumumanController@updatePengumuman')
        ->middleware('isAdmin')
        ->name('administrator.pengumuman.updatePengumuman');

Route::post('/administrator/pengumuman/delete', 'PengumumanController@deletePengumuman')
        ->middleware('isAdmin')
        ->name('administrator.pengumuman.deletePengumuman');
//end pengumuman

//penilaian

Route::get('/penilaian/index', 'PenilaianController@index')
        ->middleware('notFungsional')
        ->name('penilaian.index');

Route::get('/administrator/penilaian', 'PenilaianController@administratorPenilaian')
        ->middleware('isAdmin')
        ->name('administrator.penilaian');

Route::post('/administrator/penilaian/create', 'PenilaianController@createPenilaian')
        ->middleware('isAdmin')
        ->name('administrator.penilaian.createPenilaian');

Route::post('/administrator/penilaian/getPenilaian', 'PenilaianController@getPenilaian')
        ->middleware('isAdmin')
        ->name('administrator.penilaian.getPenilaian');

Route::post('/administrator/penilaian/update', 'PenilaianController@updatePenilaian')
        ->middleware('isAdmin')
        ->name('administrator.penilaian.updatePenilaian');

Route::post('/administrator/penilaian/delete', 'PenilaianController@deletePenilaian')
        ->middleware('isAdmin')
        ->name('administrator.penilaian.deletePenilaian');
//end penilaian

//userman
Route::get('/administrator/userman/index', 'UsermanController@administratorUserman')
        ->middleware('isAdmin')
        ->name('administrator.userman.index');

Route::post('/administrator/userman/create', 'UsermanController@createUser')
        ->middleware('isAdmin')
        ->name('administrator.userman.create');

Route::post('/administrator/userman/getUser', 'UsermanController@getUser')
        ->middleware('isAdmin')
        ->name('administrator.userman.getUser');

Route::post('/administrator/userman/updateUser', 'UsermanController@updateUser')
        ->middleware('isAdmin')
        ->name('administrator.userman.updateUser');

Route::post('/administrator/userman/deleteUser', 'UsermanController@deleteUser')
        ->middleware('isAdmin')
        ->name('administrator.userman.deleteUser');
//end userman

//detaildiskusi
Route::post('/detaildiskusi/getkomentar', 'DetaildiskusiController@getKomentar')
        ->middleware('auth')
        ->name('detaildiskusi.getKomentar');

Route::post('/detaildiskusi/update', 'DetaildiskusiController@updateKomentar')
        ->middleware('auth')
        ->name('detaildiskusi.updateKomentar');

Route::post('/detaildiskusi/delete', 'DetaildiskusiController@deleteKomentar')
        ->middleware('auth')
        ->name('detaildiskusi.deleteKomentar');
//enddetaildiskusi
