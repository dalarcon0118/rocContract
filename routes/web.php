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
    return view('dashboard');
});
Route::post('contract/get-all','ContractController@getAll');
Route::post('all/{entity}','AllFachadeController@all');
Route::post('save_all/{entity}','AllFachadeController@save_all');

Route::post('agency/get-all','AgencyController@getAll');
Route::get('price/get-all','PriceController@getAll');
Route::get('contract/room/getAll','ContractController@roomGetAll');
Route::post('contract/total','ContractController@total');
Route::post('contract/create','ContractController@create');
Route::post('fromContract/{id}/{entity}','AllFachadeController@fromContract');
