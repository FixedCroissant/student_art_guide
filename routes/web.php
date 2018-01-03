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

//Initial homepage route. [named]
Route::get('/', 'ArtworkController@index')->name('homepage');
//Limited Resource Route
Route::resource('art', 'ArtworkController',
                ['only' => ['index','show','create','store']]);
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
//Edit User Profile, which will allow for Chaning the Role of the individual.
Route::get('/profile','HomeController@profile')->name('profile');
//Allow the update of a role.
Route::post('/profileRole','HomeController@updateRole')->name('profileUpdateRole');
//Allow the deletion of a particular role.
Route::get('/profileRoleDelete/{userID}/{roleID}','HomeController@deleteRole')->name('role.remove');

//Administrative Add Art Piece.
//Allow the update of a role.
Route::get('/createArtPiece','ArtworkController@create')->name('auth.art.create');
