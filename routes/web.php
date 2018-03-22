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

//Start Auth Routes
//Override Logout Method.
Route::post('logout','Auth\LoginController@logout')->name('logout');
//Override Login Method
Route::get('login','Auth\LoginController@getLogin')->name('login');
//Override Authentication method
Route::post('authenticate','Auth\LoginController@authenticate')->name('authenticate');
//Override Register Method
Route::get('register','Auth\LoginController@getRegister')->name('register');
//Request password
Route::post('passwordRequest','Auth\LoginController@passwordRequest')->name('password.request');
//End Auth Routes.

//Initial homepage route. [named]
Route::get('/', 'ArtworkController@index')->name('homepage');
//Limited Resource Route
Route::resource('art', 'ArtworkController',
                ['only' => ['index','show','store','edit','destroy']]);

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

//Allow a way of seeing a list of all the images currently in the system.
Route::get('/auth/artwork/index','ArtworkController@authIndex')->name('auth.art.index');
//Allow a way of seeing all the fields currently in the main table along with a way of creatingQR code.
Route::get('/auth/artwork/indexAllFields','ArtworkController@authIndexFields')->name('auth.art.indexFields');



Route::get('/edit','ArtworkController@edit_list')->name('auth.art.edit_list');
Route::post('/edit/archive_img/{artIdNumber}','ArtworkController@archive_img')->name('art.archive_image');
Route::post('/update','ArtworkController@update')->name('auth.art.update');


//Pull random image.
Route::get('/artworkImage/{fileID}','ArtworkController@pullImage')->name('auth.art.pullImage');

/*
 |
 This route requires the person be logged in via Shibboleth
 |
 */
 Route::get('/auth/shibboleth','Auth\LoginController@shibbolethLogin')->name('auth.shibboleth')->middleware('auth.shib');