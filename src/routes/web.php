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

Auth::routes();

Route::get('/phpinfo', function() {return view('phpinfo');});

Route::get('/auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('/profile', "UserController@show");
Route::patch('/profile', "UserController@update");

Route::get('/search', "PasteController@showSearchResults");
Route::post('/search', "PasteController@search");

Route::get('/pastes', "PasteController@showUserPastes")->middleware('auth');

Route::get('/', "PasteController@create");
Route::post('/', "PasteController@store");
Route::patch('/', "PasteController@update")->middleware('auth');
Route::get('/{url}',['as' => '/', 'uses' => 'PasteController@show']);















