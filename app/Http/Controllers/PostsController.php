<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')->get();
        // dd($posts);

        return view('posts.index',['posts'=>$posts]);
    }

    //新規投稿
    public function create(Request $request){
        $post = $request->input('newPost');
        $id = Auth::id();
        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => $id
        ]);

        return redirect('/top');

    }

    //投稿内容の更新
    public function update(Request $request){
        $post = $request->input('updatePost');
        $id = $request->input('id');
        // dd($id);
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $post]
        );

        return redirect('/top');
    }

    //投稿の削除
    public function delete($id){
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');

    }


}
