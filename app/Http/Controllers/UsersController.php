<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;


class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user()->username;
        $email = Auth::user()->mail;
        $password = Auth::user()->password;

        return view('users.profile', compact('user', 'email', 'password'));
    }

    //ユーザー検索
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $auth = Auth::id();
        $followings = DB::table('follows')
        ->where('follower', Auth::id())
        ->get();
        $query = User::query();

        //もし検索フォームにキーワードが入力されたら
        if(!empty($keyword)){
            $query->where('username', 'like', '%'.$keyword.'%');
        }
        $users =$query->get();

        //search.blade.phpに変数として渡す
        return view('users.search', compact('users', 'keyword', 'followings', 'auth'));
    }
}
