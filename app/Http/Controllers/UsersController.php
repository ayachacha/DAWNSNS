<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;


class UsersController extends Controller
{
    //プロフィール表示
    public function profile(){
        $user = Auth::user()->username;
        $email = Auth::user()->mail;
        $password = Auth::user()->password;
        $bio = Auth::user()->bio;

        return view('users.profile', compact('user', 'email', 'password', 'bio'));
    }

    //プロフィール更新
    public function profileUpdate(Request $request){
        $user = $request->input('name');
        $email = $request->input('email');
        $newPassword = $request->input('newPassword');
        $bio = $request->input('bio');
        $iconImage = $request->file('icon-image');

        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $user,
                'mail' => $email,
                // 'password' => $newPassword,
                'bio' => $bio,
                // 'images' => $iconImage
            ]);

            if(isset($newPassword)){
                DB::table('users')
                    ->where('id', Auth::id())
                    ->update([
                        'password' => bcrypt($newPassword)
                    ]);
            }

            if(isset($iconImage)){
                DB::table('users')
                    ->where('id', Auth::id())
                    ->update([
                        'images' => $iconImage->getClientOriginalName()
                    ]);
                $iconImage->storeAs('', $iconImage->getClientOriginalName(), 'public');
            }

            return redirect('/profile');
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
        //ログインユーザー以外のユーザー情報
        $users =$query->where('id', '!=', Auth::user()->id)->get();

        //search.blade.phpに変数として渡す
        return view('users.search', compact('users', 'keyword', 'followings', 'auth'));
    }
}
