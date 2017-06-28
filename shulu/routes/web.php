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
function user_ins(){
    return new 	App\User;
}

Route::get('/', function () {
    return view('index');
   // return ['version'=>'1.0'];	
});

Route::get('api/signup',function(){
    $user = new App\User;
    return $user->signup();
});

Route::get('api/login',function(){
    return user_ins()->login();
});


