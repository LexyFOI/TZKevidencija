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

Route::post('/events', 'EventsController@store');
Route::patch('/events/{event}', 'EventsController@update');
Route::delete('/events/{event}', 'EventsController@destroy');

Route::post('/groups', 'GroupsController@store');