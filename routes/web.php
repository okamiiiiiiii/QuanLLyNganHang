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
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'AccountController@getByID')->where('id', '[0-9]+');
    Route::get('users/{id}/clone', 'AccountController@getByIDClone')->where('id', '[0-9]+');


    Route::post('users/{a}/addAccount/add', 'AccountController@create');
    Route::get('users/{a}/addAccount', function () {
        return view('front-end/addAccount');

    });

    Route::post('users/{a}/editAccount/{b}/edit', 'AccountController@edit');
    Route::get('users/{idUser}/editAccount/{idAccount}', function($idUser, $idAccount){
        $account = \App\Models\Accounts::find($idAccount);
        return view('front-end/editAccount',compact('account'));
    });
    Route::get('users/{a}/delAccount/{b}', 'AccountController@delete');

    Route::get('users/getAllByJSON','UserController@getJSON')->name('get-accounts');
});




    ;





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
