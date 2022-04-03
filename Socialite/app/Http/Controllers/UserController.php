<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function changeStatus(Request $req)
    {
        $userId = decrypt($req->userId);
        $user = User::where('id', $userId)->first();
        if($user->status == 0)
        {
            $user->status = 1;
            $user->save();
            return redirect()->back();
        }
        $user->status = 0;
        $user->save();
        return redirect()->back();
    }
}
