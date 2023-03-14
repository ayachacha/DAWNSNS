<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Post;
use App\Follow;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
        // dd($posts);

        return view('posts.index', compact('posts'));
    }

    //新規投稿
    public function create(Request $request){
        $post = $request->input('newPost');
        $id = Auth::id();
        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => $id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/top');

    }

    //投稿内容の更新
    public function update(Request $request){
        $updatePost = $request->input('updatePost');
        $id = $request->input('id');
        // dd($id);
        DB::table('posts')
            ->where('id', $id)
            ->update([
                'posts' => $updatePost,
                'updated_at' => now()
            ]);

        return redirect('/top');
    }

    //投稿の削除
    public function delete(Request $request){
        DB::table('posts')
            ->where('id', $request->id)
            ->delete();

        return redirect('/top');

    }

    public function test(Request $request){
        $userPosts = DB::table('posts')
            ->where('user_id', Auth::id())
            ->get();

        return view('posts.test', compact('userPosts'));
    }


}
