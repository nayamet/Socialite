<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function userNotifier()
    {
        return $this->belongsTo(User::class, 'fk_notifier_users_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_users_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'fk_posts_id');
    }
}
