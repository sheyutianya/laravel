<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use Hash;

class User extends Model
{
    public function signup()
    {
        //1.檢查用戶名和密碼是否爲空
	//2.檢查用戶名是否存在
	//3.加密密碼
	//4.存入數據庫
        //dd(Request::all());// return 'signup';
    	$username = Request::get('username');
	$password = Request::get('password');

	if(!$username && !$password){
	 // return 'sss';
	   return ['status'=>0 , 'msg'=>'用戶名或者密碼爲空']; 
	//return ['status'=>0,'msg'=''];
	}
      	
	$user_exists = $this
	  ->where('name',$username) 
	  ->exists();
	
	if($user_exists)
	{
	   return ['status'=>0,'msg'=>'用戶名已經存在'];
	}
   	 
	$hashed_password = bcrypt($password);
	
	//dd($hashed_password);	
    	$user = $this;
	$user->password = $hashed_password;
	$user->name = $username;
	if($user->save())
	{
	    return ['statu'=>1,'id'=>$user->id];
	}
	//return '1w';
    }

    //
    public function login(){
	return 'login';
    }
}

