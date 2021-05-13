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
});

