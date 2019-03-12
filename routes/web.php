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

Route::get('/calculate','Screen_controller@Display_Calculator_screen');
Route::post('/calculate/Exchange','Currencies_controller@Exchange_results');
Route::post('/Crud/Update','Currencies_controller@Update');
Route::post('/Crud/Insert','Currencies_controller@Add');
Route::post('/Crud/Delete','Currencies_controller@Delete');
Route::get('/Crud','Screen_controller@Display_Crud_screen');
