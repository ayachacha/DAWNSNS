<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * ユーザーの全ポストの取得
     */
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
