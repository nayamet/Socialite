<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
class AdminController extends Controller
{
    public function dashboard()
    {
        $info = [
            'totalUsers' => User::select('id')->get()->count(),
            'totalPosts' => Post::select('id')->get()->count(),
            'totalLikes' => Like::select('id')->get()->count(),
            'totalComments' => Comment::select('id')->get()->count(),
        ]; 
        return view('Admin.dashboard')->with('info', (object)$info);
    }

    public function usersInfo()
    {
        $users = User::select('*')->get();
        return view('Admin.adminUsers')->with('users', $users);
    }

    public function postsInfo()
    {
        $posts = Post::select('*')->get();
        return view('Admin.adminPosts')->with('posts', $posts);
    }

    public function commentsInfo()
    {
        $comments = Comment::select('*')->get();
        return view('Admin.adminComments')->with('comments', $comments);
    }



}
