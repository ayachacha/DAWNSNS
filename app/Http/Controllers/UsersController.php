<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //プロフィール表示
    public function profile(){
        $username = Auth::user()->username;
        $mail = Auth::user()->mail;
        $password = Auth::user()->password;
        $bio = Auth::user()->bio;

        return view('users.profile', compact('username', 'mail', 'password', 'bio'));
    }

    //プロフィール更新
    public function profileUpdate(Request $request){
        //バリデーション
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'string', 'email', 'max:255', Rule::unique('users','mail')->ignore(Auth::id('mail'))],
            'newPassword' => ['nullable', 'string', 'min:4']
        ],[
            'username.required' => '必須項目です',
            'username.max' => '文字数オーバーです',
            'mail.required' => '必須項目です',
            'mail.email' => 'メールアドレスではありません',
            'mail.max' => '文字数オーバーです',
            'mail.unique' => 'メールアドレスが重複してます',
            'newPassword.min' => '4文字以上で入力してください',
        ]);
        //ユーザー情報入力されたものを受け取る
        $username = $request->input('username');
        $mail = $request->input('mail');
        $newPassword = $request->input('newPassword');
        $bio = $request->input('bio');
        $iconImage = $request->file('icon-image');

        //ユーザー名・メールアドレス・プロフィールの更新
        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $username,
                'mail' => $mail,
                // 'password' => $newPassword,
                'bio' => $bio,
                // 'images' => $iconImage
            ]);

            //パスワードが入力されたら更新する
            if(isset($newPassword)){
                DB::table('users')
                    ->where('id', Auth::id())
                    ->update([
                        'password' => bcrypt($newPassword)
                    ]);
            }

            //アイコン画像画添付されたら更新する
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

    public function otherProfile($id){
        $user = DB::table('users')
        ->where('id', $id)->first();
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('posts.user_id', $id)
        ->select('users.username', 'users.images','posts.posts','posts.created_at as created_at')
        ->get();

        $followings = DB::table('follows')
        ->where('follower', Auth::id())
        ->get();

        return view('users.otherprofile', compact('user', 'posts','followings'));
    }
}
