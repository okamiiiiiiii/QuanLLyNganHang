<?php

use App\Models\User;
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
    return redirect('home');
});

Route::middleware('auth')->group(function() {
    Route::get('users', 'UserController@index')->name('users.index');


    Route::get('accounts', 'AccountController@index')->name('account.index');
    Route::get('users/{id}', 'AccountController@show')->where('id', '[0-9]+')->name('accounts.show');

    Route::get('users/{id}/createAccount', 'AccountController@create')->name('account.create');
    Route::post('users/{id}/createAccount/store', 'AccountController@store')->name('account.store');

    Route::get('users/{idUser}/editAccount/{id}', 'AccountController@edit')->name('account.edit');
    Route::post('users/{idUser}/editAccount/{id}/update', 'AccountController@update')->name('account.update');

    Route::get('users/{idUser}/delAccount/{id}', 'AccountController@delete')->name('account.destroy');


    Route::get('users/getAllByJSON', 'UserController@getJSON')->name('get-users');
    Route::get('users/{id}/getAllByJSON','AccountController@getJSON')->name('get-accounts');
    Route::get('getAllAccountByJSON', 'AccountController@getAllJSON')->name('get-all-accounts');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

