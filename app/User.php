<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // フォローされているユーザーを取得
    public function followers(){
        return $this->belongsToMany('App\User', 'follows', 'follow_id', 'follower_id');
    }

    // フォローしているユーザーを取得
    public function follows(){
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'follow_id');
    }

    //フォローする
    public function follow($user_id){
        return $this->follows()->attach($user_id);
    }

    //フォローを解除する
    public function nofollow($user_id){
        return $this->follows()->detach($user_id);
    }

    //フォローしているか
    public function isFollowing($user_id){
        return(boolean)$this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    //フォローされているか
    public function isFollowed($user_id){
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }

}
