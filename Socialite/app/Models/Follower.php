<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function userFollower()
    {
        return $this->belongsTo(User::class, 'fk_follower_users_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_users_id');
    }
}
