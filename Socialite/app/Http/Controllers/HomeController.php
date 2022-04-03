<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\Post;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::get();
        // return gettype($posts);
        // $data = array();
        // foreach($posts as $p)
        // {
        //     $data = [
        //         'likeCount' => count($p->like),
        //         'commentCount' => count($p->comment),
        //         'saveCount' => count($p->favourite),
        //         'userName' => $p->user->name,
        //         'postId' => $p->id,
        //         'postCreatedAt' => $p->createdAt,
        //         'postText' => $p->postText,
        //         'userId' => $p->fk_users_id,
        //         'postImage' => $p->postImage
        //     ];
        //     //array_push($data, $temp);
        // }
        // $data = (object)$data;
        // print_r($posts);die();
        
        return view('home')->with('posts', $posts);
    }
}
