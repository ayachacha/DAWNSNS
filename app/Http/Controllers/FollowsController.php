<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use DB;
use Auth;

class FollowsController extends Controller
{
    public function followList(){
        //フォローリスト（ログイン者がフォローしているユーザーの一覧）
        $follows = User::join('follows', 'users.id', '=', 'follows.follow')
        ->where('follows.follower', '=', Auth::user()->id)
        ->select('users.id', 'users.images')
        ->get();
        // dd($follows);

        //フォローしているユーザーの投稿
        $posts = Post::join('follows', 'follows.follow', '=', 'posts.user_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->where('follows.follower', '=', Auth::user()->id)
        ->select('users.images', 'users.username', 'posts.posts', 'posts.created_at as created_at')
        ->get();
        // dd($posts);

        //followsList,blade.phpに返す
        return view('follows.followList', compact('follows', 'posts'));
    }


    //フォロワーリスト（ログイン者のことをフォローしているユーザーの一覧）
    public function followerList(){
        //フォロワーリスト（ログイン者のことをフォローしているユーザーの一覧）
        $followers = User::join('follows', 'users.id', '=', 'follows.follower')
        ->where('follows.follow', '=', Auth::user()->id)
        ->get();

        $posts = Post::join('follows', 'follows.follower', '=', 'posts.user_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->where('follows.follow', '=', Auth::user()->id)
        ->get();

        return view('follows.followerList', compact('followers','posts'));
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
