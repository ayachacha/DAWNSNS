@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

{!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
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
                            <button type="submit" class="btn btn-success pull-right">更新</button>
                    {!! Form::close() !!}
                </td>
                <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらのつぶやきを削除します。よろしいでしょうか？')">削除</a></td>
            </tr>
            @endforeach
        </table>

@endsection
