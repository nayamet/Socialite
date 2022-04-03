<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function commentView(Request $req)
    {
        $postId = decrypt($req->postId);
        $post = Post::where('id', $postId)->first();
        $comments = Comment::select('*')->where('fk_posts_id', $postId)->get();
        return view('comment')->with('comments', $comments)->with('post', $post);
    }

    public function commentCreate(Request $req)
    {
        $req->validate(
            [
                'comment' => 'required',
            ]
        );
        $postId = decrypt($req->postId);
        $c = new Comment();
        $c->text = $req->comment;
        $c->createdAt = Carbon::now();
        $c->fk_users_id = Session::get('id');
        $c->fk_posts_id = $postId;
        $c->save();

        $notification = new Notification();
        $notification->fk_users_id = $c->post->user->id;
        $notification->fk_notifier_users_id = Session::get('id');
        $notification->createdAt = Carbon::now();
        $notification->fk_posts_id = $postId;
        $notification->msg = "commented on your post";
        $notification->save();
        return redirect()->back();
    }

    public function commentEdit(Request $req)
    {
        $commentId = decrypt($req->commentId);
        $comment = Comment::where('id', $commentId)->first();
        return view('commentEdit')->with('comment', $comment);
    }

    public function commentEditSubmit(Request $req)
    {
        $req->validate(
            [
                'comment' => 'required',
            ]
        );
        $commentId = decrypt($req->commentId);
        $c = Comment::where('id', $commentId)->first();
        $c->text = $req->comment;
        $c->save();
        $postId = encrypt($c->fk_posts_id);
        return redirect()->route('comment.view', ['postId' =>$postId]);
    }

    public function commentDelete(Request $req)
    {
        $commentId = decrypt($req->commentId);
        $c = Comment::where('id', $commentId)->delete();
        return redirect()->back();
    }
}
