@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->

{!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}

    <input type="image" class="btn-success pull-right" src="images/post.png" alt="投稿"></input>
    </div>
{!! Form::close() !!}

@foreach($posts as $post)
    <table class="posts-group">
        <tr class="post-content">
            <td><a class="icon-image"><img src="{{asset('storage/'. $post->images)}}" alt="アイコン画像"></a></td>
            <td>{{$post->username}}</td>
            <td>{{ $post->posts }}</td>
            <td>{{ $post->created_at }}</td>
            @if($post->user_id === Auth::user()->id)
            <!-- 編集ボタン -->
            <td class="">
                <a class="edit" data-target="{{ $post->id }}">
                    <input type="image" src="images/edit.png">
                </a>
            </td>
            <!-- 削除ボタン -->
            <td class = "delete">
                <form method="get" action="/post/delete">
                    <input type="hidden" name="id" value="{{$post->id}}">
                        <a onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
                            <input class="image btn-dell" type="image" src="images/trash.png" onmouseover="this.src='images/trash_h.png'" onmouseout="this.src='images/trash.png'">
                        </a>
                </form>
            </td>
            @endif
        </tr>
        <!-- モーダル　ボタンクリック後に表示される画面の内容 -->
        <div class="modal" id="{{ $post->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        {!! Form::open(['url' => 'post/update']) !!}
                        {!! Form::input('text', 'updatePost', $post->posts, ['required', 'class' => 'form-control']) !!}
                        {!! Form::input('hidden', 'id', $post->id, ['required', 'class' => 'form-control']) !!}
                        <input type="image" class="btn btn-success pull-right" src="images/edit.png" alt="更新">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endforeach
    </table>
@endsection
