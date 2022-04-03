<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_users_id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'fk_posts_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'fk_posts_id');
    }

    public function favourite()
    {
        return $this->hasMany(Save::class, 'fk_posts_id');
    }
}
