<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\User;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/emailExists/{email}', function(Request $request) {
    $count = User::where('email', $request->email)->count();
    
    if($count) {
        return [ 'msg' => 'Email Exists', 'status' => 400 ];
    } else {
        return [ 'status' => 200 ];
    }
});

Route::get('/usernameExists/{username}', function(Request $request) {
    $count = User::where('username', $request->username)->count();

    if($count) {
        return [ 'msg' => 'Username Exists', 'status' => 400 ];
    } else {
        return [ 'status' => 200 ];
    }
});

// Route::get('/users/{id}', function(Request $request) {
//     $user = User::find($request->id);
//     return $user;
// });

Route::get('/users/{user}', function(User $user) {
    return $user;
});