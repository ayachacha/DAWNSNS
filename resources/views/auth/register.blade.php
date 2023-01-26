@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('username') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if($errors->has('username'))
{{ $errors->first('username')}}
@endif

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if($errors->has('mail'))
{{ $errors->first('mail')}}
@endif

{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}
@if($errors->has('password'))
{{ $errors->first('password')}}
@endif

{{ Form::label('password confirm') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
@if($errors->has('password_comfirmation'))
{{ $errors->first('password_comfirmation')}}
@endif

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
