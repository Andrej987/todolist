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
    return view('welcome');
});

Route::get('/test', function () {
    return Auth::user()->test();
});

// Route::get('/addFriend/{id}', function () {
//     return Auth::user()->addFriend();
// })->name('addFriend');

Auth::routes();

Route::get('/findFriends', 'ProfileController@findFriends')->name('findFriends');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile/{id}', 'ProfileController@index')->name('profile');
Route::get('editProfile', 'ProfileController@editProfile')->name('editProfile');

Route::post('updateProfile', 'ProfileController@updateProfile')->name('updateProfile');

Route::get('/addFriend/{id}', 'ProfileController@addFriend')->name('addFriend');

Route::get('/changePhoto','ProfileController@changePhoto')->name('changePhoto');
Route::post('/uploadPhoto', 'ProfileController@uploadPhoto')->name('uploadPhoto');

Route::get('friendRequests', 'ProfileController@friendRequests')->name('friendRequests');
Route::get('declineFriendship/{id}', 'ProfileController@declineFriendship')->name('declineFriendship');


Route::get('friendsList', 'ProfileController@friendsList')->name('friendsList');

Route::get('comfirmFriendship/{id}', 'ProfileController@comfirmFriendship')->name('comfirmFriendship');

//
// Route::group(['middleware'=> 'auth'], function(){
//   Route::get('home/', 'HomeController@index');
//   Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
// });
