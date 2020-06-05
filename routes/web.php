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
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'role:admin'], function() {
    Route::namespace('Admin')->name('admin.')->group(function(){
        Route::resource('/dashboard','AdminUserController');
    });
 });
Route::get('/forum','TopicController@index')->name('topics.index');
Route::resource('topics', 'TopicController')->except(['index']);
Route::post('/comments/{topic}','CommentController@store')->name('comments.store');
//Route::post('/comments/{topic}', 'CommentController@destroy')->name('comments.delete');

Auth::routes();
Route::get('/home','TopicController@index')->name('topics.index');
Route::get('/profile', 'ProfileController@index');

Route::get('/profile/{id}', 'ProfileController@show');

Route::post('/editInfo/{id}', 'ProfileController@editInfo')->name('editInfo');

