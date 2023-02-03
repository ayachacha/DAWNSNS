<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use DB;
use Auth;

class FollowsController extends Controller
{
    public function followList(){
        $users = User::all();

        //followsList,blade.phpに usersを返す
        return view('follows.followList', compact('users'));
    }

    public function followerList(){
        return view('follows.followerList');
    }


    //フォローする　
    public function create(Request $request){
        $id = $request->id;
        DB::table('follows')
        ->insert([
            'follow'=>$id,
            'follower'=>Auth::id(),
            'created_at'=>now()
        ]);
        return back();
    }
    //フォローを外す
    public function delete(Request $request){
        $id = $request->id;
        DB::table('follows')
        ->where([
            'follow'=>$id,
            'follower'=>Auth::id(),
        ])->delete();
        return back();
    }


}
