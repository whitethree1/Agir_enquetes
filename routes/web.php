<?php

use App\Http\Controllers\TopController;
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
    return view('welcome');
});
Route::get('top', 'TopController@index');

Route::get('create', 'EnquetesController@create');
Route::post('confirm', 'EnquetesController@confirm');
Route::post('complete', 'EnquetesController@complete');

Route::get('enquetes_form', 'FormController@index');
Route::get('form_detail/{id}', 'FormController@detail');

Route::get('archive', 'EnquetesController@archive');
Route::get('archive_detail/{id}', 'EnquetesController@detail');
Route::get('archive_detail/{id}/{item_id}', 'EnquetesController@summary_items');
Route::post('archive_detail/{id}/summary', 'EnquetesController@summary_items_by_reservedate');

Route::get('answer/{hash?}', 'AnswerController@index');
Route::get('/thanks', 'AnswerController@thanks');