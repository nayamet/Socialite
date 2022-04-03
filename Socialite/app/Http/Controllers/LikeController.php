<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    public function likeCreate(Request $req)
    {
        $postId = decrypt($req->postId); 
        $like = Like::select('*')->where(
            [
                ['fk_posts_id', '=', $postId],
                ['fk_users_id', '=', Session::get('id')]
            ]
        )->first();
        if($like != null)
        {
            $like->delete();
            return redirect()->back();
        }
        $like = new Like();
        $like->fk_posts_id = $postId;
        $like->fk_users_id = Session::get('id');
        $like->save();

        $notification = new Notification();
        $notification->fk_users_id = $like->post->user->id;
        $notification->fk_notifier_users_id = Session::get('id');
        $notification->createdAt = Carbon::now();
        $notification->fk_posts_id = $postId;
        $notification->msg = "liked your post";
        $notification->save();
        return redirect()->back();
    }
}
