<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    public function add()
    {
        if(!user_ins()->is_logged_in()){
            return err(['msg' => 'loging required']);
        }
        if(!rq('title')){
            return err(['msg' => 'title is null']);
        }
        return 1;
    }
}
