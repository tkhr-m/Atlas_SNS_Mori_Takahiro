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
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

//リレーション　多対多

    public function follow(){
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');
    }

    public function followed(){
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');
    }


//フォロー関連機能
  //フォローしているか、していないか
    public function isFollowing($user_id) {
        return (bool) $this->follow()->where('followed_id',$user_id)->first();
    }
  //フォローされているか、されていないか
    public function isFollowed($user_id){
        return (bool) $this->followed()->where('following_id',$user_id)->first();
    }

  //フォロー数
    public function followee(){
        return $this->follow()->get();
    }
  //フォロワー数
    public function follower(){
        return $this->followed()->get();
    }

}
