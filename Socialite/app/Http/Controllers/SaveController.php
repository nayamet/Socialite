<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Save;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class SaveController extends Controller
{
    public function saveCreate(Request $req)
    {
        $postId = decrypt($req->postId); 
        $fav = Save::select('*')->where(
            [
                ['fk_posts_id', '=', $postId],
                ['fk_users_id', '=', Session::get('id')]
            ]
        )->first();
        if($fav != null)
        {
            $fav->delete();
            return redirect()->route('home');
        }
        $fav = new Save();
        $fav->fk_posts_id = $postId;
        $fav->fk_users_id = Session::get('id');
        $fav->save();

        $notification = new Notification();
        $notification->fk_users_id = $fav->post->user->id;
        $notification->fk_notifier_users_id = Session::get('id');
        $notification->createdAt = Carbon::now();
        $notification->fk_posts_id = $postId;
        $notification->msg = "favourited your post";
        $notification->save();
        return redirect()->back();
    }

    public function saveShow()
    {
       $saves = Save::where('fk_users_id', Session::get('id'))->get();
       return view('savePosts')->with('saves', $saves);
    }
}
