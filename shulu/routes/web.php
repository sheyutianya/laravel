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

function rq($key=null,$default=null){
    if(!$key) return Request::all();
    return Request::get($key,$default);
}

function err($data = null){
    return ['status'=> 1 , 'msg' => $data];
}

function suc_res($data = null){
     return ['status' => 1 , 'data' => $data];
}

function queston_ins(){
    return new App\Question;
}

function user_ins(){
    return new 	App\User;
}

Route::any('/', function () {
    return view('index');
});

Route::any('api/signup',function(){
    $user = new App\User;
    return $user->signup();
});

Route::any('api/login',function(){
    return user_ins()->login();
});

Route::any('api/logout',function(){
    return user_ins()->logout();
});

Route::any('api/exists',function(){
    return user_ins()->exist();
});

Route::any('api/question/add',function(){
    return queston_ins()->add();
});


