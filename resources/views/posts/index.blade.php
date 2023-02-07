@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->

{!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
        </div>
        <input type="image" class="btn btn-success pull-right" src="images/post.png" alt="投稿"></input>
        {!! Form::close() !!}

 <table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    {!! Form::open(['url' => 'post/update']) !!}
                        {!! Form::input('text', 'updatePost', $post->posts, ['required', 'class' => 'form-control']) !!}
                        {!! Form::input('hidden', 'id', $post->id, ['required', 'class' => 'form-control']) !!}
                            <input type="image" class="btn btn-success pull-right" src="images/edit.png" alt="更新"></input>
                    {!! Form::close() !!}
                </td>
                <td>
                    <input type="image" class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')" src="images/trash.png" alt="削除"></input>
                </td>
            </tr>
            @endforeach
        </table>

@endsection
