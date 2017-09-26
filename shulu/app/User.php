<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use Hash;

class User extends Model
{
    function suc_res($data = null){
        return ['status' => 1 , 'data' => $data];
    }

    function err($data = null){
        return ['status' => 0 , 'data' => $data];
    }

    function test_func(){
        dd('ssssss');
    }

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
	        return ['status'=>0 , 'msg'=>'用戶名或者密碼爲空'];
	    }

	    $user_exists = $this
	        ->where('name',$username)
	        ->exists();

	    if($user_exists)
	    {
	       return ['status'=>0,'msg'=>'用戶名已經存在'];
	    }

	    $hashed_password = bcrypt($password);

    	$user = $this;
	    $user->password = $hashed_password;
	    $user->name = $username;
	    if($user->save())
	    {
	        return ['statu'=>1,'id'=>$user->id];
	    }
    }

    //
    public function login(){
        //1 check name and password is null
        //2 check name exist
        //3 check password is right
        //4 write user info to session
        $has_nameandpassword = $this->has_username_and_password();
        if(!$has_nameandpassword){
            return $this->err(['msg' => 'password or username is null']);
        }
        $username = $has_nameandpassword[0];
        $password = $has_nameandpassword[1];
        $user = $this->where('name',$username)->first();
        if(!$user){
            return $this->err(['msg' => 'username is not exist']);
        }
        $hashed_password = $user->password;
        if(!Hash::check($password,$hashed_password)){
            return $this->err(['msg' => 'password is wrong']);
        }

        session()->put('username',$user->name);
        session()->put('user_id',$user->id);
//        dd(session()->all());
        return $this->suc_res(['id' => $user->id]);
    }

    public function logout(){
        //session()->flush();
        //dd(session()->all());
        session()->pull('username');
        session()->forget('user_id');
        //dd(session()->all());
        return $this->suc_res();
    }

    // check user is login
    public function is_logged_in(){
        return session('user_id')?:false;
    }

    public function exist(){
		//return ['status'=>0 , 'msg'=>'nihao'];
        return $this->suc_res(['count' => $this->where(rq())->count()]);
    }

    function has_username_and_password(){
    	$username = Request::get('username');
	    $password = Request::get('password');
        if($username && $password){
            return [$username,$password];
        }
        return false;
    }
}

