<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //ユーザー検索
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $query = User::query();

        //もし検索フォームにキーワードが入力されたら
        if(!empty($keyword)){
            $query->where('username', 'like', '%'.$keyword.'%');
        }
        $posts =$query->get();

        //search.blade.phpにpostsとkeywordを変数として渡す
        return view('users.search', compact('posts', 'keyword'));
    }
}
