<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use Illuminate\Support\Facades\Session;

class FollowerController extends Controller
{
    public function followerCreate(Request $req)
    {
        $userId = decrypt($req->userId);
        $result = Follower::select('*')->where([
            ['fk_follower_users_id', '=', Session::get('id')],
            ['fk_users_id', '=', $userId]
        ])->first();

        if($result != null)
        {
            $result->delete();
            return redirect()->back();
        }

        $result = new Follower();
        $result->fk_follower_users_id = Session::get('id');
        $result->fk_users_id = $userId;
        $result->save();
        return redirect()->back();
    }

    public function checkFollowing(Request $req)
    {
        $userId = decrypt($req->userId);
        $result = Follower::select('*')->where([
            ['fk_follower_users_id', '=', Session::get('id')],
            ['fk_users_id', '=', $userId]
        ])->first();
        return $result;
    }

    public function followerShow()
    {
        $followers = Follower::where('fk_users_id', Session::get('id'))->get();
        return view('followerShow')->with('followers', $followers);
    }

    public function followingShow()
    {
        $followings = Follower::where('fk_follower_users_id', Session::get('id'))->get();
        return view('followingShow')->with('followings', $followings);
    }
}
