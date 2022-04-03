<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function postCreate(Request $req)
    {
        $req->validate(
            [
                'postData' => 'required',
            ]
        );

        $p = new Post();
        $p->postText = $req->postData;
        $p->createdAt = Carbon::now();
        $p->status = 1;
        $p->fk_users_id = Session::get('id');
        $p->save();
        return redirect()->back();
    }

    public function myPosts()
    {
        $posts = Post::where('fk_users_id', Session::get('id'))->get();
        return view('myPosts')->with('posts', $posts);
    }

    public function postEdit(Request $req)
    {
        $postId = decrypt($req->postId);
        $post = Post::where('id', $postId)->first();
        return view('editPost')->with('post', $post);
    }

    public function postEditSubmit(Request $req)
    {
        $req->validate(
            [
                'postData' => 'required',
            ]
        );
        $postId = decrypt($req->postId);
        $p = Post::where('id', $postId)->first();
        $p->postText = $req->postData;
        $p->save();
        return redirect()->route('home');
    }

    public function postDelete(Request $req)
    {
        $postId = decrypt($req->postId);
        $p = Post::where('id', $postId)->delete();
        return redirect()->back();
    }
}
