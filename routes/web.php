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

Route::get('/', 'homeController@showHompage')->name('hompage');

//Setup GET
Route::get('/kurulum', 'setupController@showSetupWelcome')->name('show.setup.welcome');
Route::get('/kurulum/yonetici-ekle', 'setupController@showAddFirstManager')->name('show.setup.addFirstManager');
Route::get('/kurulum/firma-bilgileri', 'setupController@showAddCompany')->name('show.setup.addCompany');
Route::get('/kurulum/kurulumu-bitir', 'setupController@showSetupDone')->name('show.setup.done');

//Setup POST
Route::post('/kurulum/kullanici-ekle', 'setupController@addFirstManager')->name('setup.addFirstManager');
Route::post('/kurulum/firma-bilgileri-ekle', 'setupController@addCompany')->name('setup.addCompany');


//Auth GET
Route::get('/giris-yap', 'authController@showLogin')->name('show.login');
Route::get('/cikis', 'authController@logout')->name('logout');
//Auth POST
Route::post('/giris', 'authController@login')->name('login');


//Pages GET


Route::prefix('/subeler')->group(function ()
{
	Route::get('/', 'branchController@showBranches')->name('show.branchList');
	Route::get('/yeni-sube-ekle', 'branchController@addNewBranchShow')->name('show.add.branch');
	Route::post('/sube-ekle', 'branchController@addNewBranch')->name('add.branch');
	Route::post('/sil', 'branchController@deleteBranch')->name('delete.branch');
	Route::get('/sube-duzenle', 'branchController@showEdit')->name('show.edit.branch');
	Route::post('/duzenle' ,'branchController@edit')->name('edit.branch');
});

Route::prefix('/personel')->group(function ()
{
	Route::get('/', 'personnelController@showList')->name('show.personnelList');
	Route::post('/sil', 'personnelController@delete')->name('delete.personnel');
	Route::get('/personel-ekle', 'personnelController@showAddNewPersonnel')->name('show.add.personnel');
	Route::post('/ekle', 'personnelController@addPersonnel')->name('add.personnel');
	Route::get('/personel-duzenle', 'personnelController@showEdit')->name('show.edit.personnel');
	Route::post('/duzenle', 'personnelController@edit')->name('edit.personnel');
});

Route::prefix('/musteriler')->group(function (){
	Route::get('/', 'customerController@showCustomer')->name('show.customer');
	Route::get('/sil', 'customerController@delete')->name('delete.customer');
	Route::get('/musteri-ekle', 'customerController@showAdd')->name('show.add.customer');
	Route::post('/ekle', 'customerController@addCustomer')->name('add.customer');
	Route::get('/duzenle', 'customerController@showEdit')->name('show.edit.customer');
	Route::post('/musteri-duzenle', 'customerController@edit')->name('edit.customer');
});

Route::prefix('/notlar')->group(function (){
	Route::get('/', 'notesController@showNotes')->name('show.notes');
	Route::get('/oku', 'notesController@readNote')->name('read.notes');
	Route::get('/yeni-not-ekle', 'notesController@showAdd')->name('show.add.note');
	Route::post('/ekle', 'notesController@add')->name('add.note');
});

Route::prefix('/satislar')->group(function (){
	Route::get('/', 'salesController@showSales')->name('show.sales');
	Route::get('/goruntule', 'salesController@showSale')->name('show.sale');
	Route::get('/yeni-satis-ekle', 'salesController@showAdd')->name('show.add.sale');
	Route::post('/ekle', 'salesController@add')->name('add.sale');
});

Route::prefix('/ziyaretler')->group(function(){
	Route::get('/ziyaret-ekle', 'visitController@showAdd')->name('show.add.visit');
	Route::post('/ekle', 'visitController@add')->name('add.visit');
	Route::get('/aktif-ziyaretler', 'visitController@showVisit')->name('show.visit');
	Route::get('/gecmis-ziyaretler', 'visitController@showVisitHistory')->name('show.visit.history');
	Route::get('/yapilacak-ziyaretler', 'visitController@showMyVisits')->name('show.myVisits');
	Route::get('/yapilacak-ziyaretlerim', 'visitController@showMyVisitHistory')->name('show.myVisitHistory');
	Route::get('/ziyareti-tamamla', 'visitController@showComplete')->name('show.complete.visit');
	Route::post('/tamamla', 'visitController@complete')->name('complete.visit');
	Route::get('/incele', 'visitController@showviewVisit')->name('show.view.visit');
});

//Logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');