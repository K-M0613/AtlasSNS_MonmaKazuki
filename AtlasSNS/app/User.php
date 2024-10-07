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
        'username', 'mail', 'password','images', 'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {
        return $this->hasMany('App\Post');
    }

    // フォロワーとのリレーション
    public function followUsers()
    {
        return $this->belongsToMany('App\User','follows', 'followed_id', 'following_id');
    }
    // フォローしているユーザーとのリレーション
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }
// フォローする
    public function follow(Int $user)
    {
        return $this->follows()->attach($user);
    }
// フォロー外す
    public function unfollow(Int $user)
    {
        return $this->follows()->detach($user);
    }
// フォローしているかを確認
    public function isFollowing($user)
    {
        return $this->follows()->where('followed_id',$user)->exists();
    }
// フォローされているかの確認
    public function isFollowed($user)
    {
        return $this->follows()->where('following_id', $user)->exists();
    }
}
