<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    public function add(){
        if(!user_ins()->is_logged_in()){
            return err(['msg' => 'loging required']);
        }
        if(!rq('title')){
            return err(['msg' => 'title is null']);
        }
        $question = $this;
        $title = rq('title');
        $desc = rq('desc');
        $user_id = session()->get('user_id');
        $question.title = $title;
        $question.desc = $desc;
        $question.user_id = $user_id;
        if($question->save())
        {
            return ['statu'=>1,'id'=>$question->id];
        }
    }
    
    public function destroy(){
        if(!user_ins()->is_logged_in()){
            return err(['msg' => 'login required']);
        }
    }
    
    public function update(){
        if(!user_ins()->is_logged_in()){
            return err(['msg' => 'login required']);
        }
    }
    
    public function find(){
        if(!user_ins()->is_logged_in()){
            return err(['msg' => 'login required']);
        }
    }
}
