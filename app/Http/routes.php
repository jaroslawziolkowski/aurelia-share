<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Request::header();
Route::get('/js/aurelia/{$file}.html','WebController@getHttpvView');

Route::get('/', function () {
    return view('welcome');
});



Route::put('/oauth/access_token', function(){
    return response()->json(\Authorizer::issueAccessToken());
});

Route::get('/api',['middleware' => ['oauth', 'oauth-user'], function(){

    $userId = Authorizer::getResourceOwnerId();
    return \App\User::find($userId);
}]);
