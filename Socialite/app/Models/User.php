<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Work_profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    public function workProfile()
    {
        return $this->hasMany(Work_profile::class, 'fk_users_id');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'fk_users_id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'fk_users_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'fk_users_id');
    }

    public function favourite()
    {
        return $this->hasMany(Save::class, 'fk_users_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'fk_users_id');
    }

    public function follower()
    {
        return $this->hasMany(Follower::class, 'fk_users_id');
    }

    public function following()
    {
        return $this->hasMany(Follower::class, 'fk_follower_users_id');
    }
}
