<?php
use App\Task;
use Illuminate\Http\Request;

Route::get('/', "TaskController@index");
Route::post('/task', "TaskController@store");
Route::delete('/task/{task}', "TaskController@destroy");

Auth::routes();
