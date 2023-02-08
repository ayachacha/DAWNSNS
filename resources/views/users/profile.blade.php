@extends('layouts.login')

@section('content')

<div id="profile-edit">
  <img src="{{ asset('/storage/' . Auth::user()->images) }}" alt="プロフィール画像">
  <form action="/profile/update" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id">

    <p>UserName</p>
    <input type="text" name="username" value="{{$username}}">
    @if($errors->has('username'))
    {{ $errors->first('username')}}
    @endif

    <p>MailAddress</p>
    <input type="email" name="mail" value="{{$mail}}">
    @if($errors->has('mail'))
    {{ $errors->first('mail')}}
    @endif

    <P>Password</P>
    <input type="password" name="password" value="{{$password}}" disabled>

    <p>new Password</p>
    <input type="password" name="newPassword" value="">
    @if($errors->has('newPassword'))
    {{ $errors->first('newPassword')}}
    @endif

    <p>Bio</p>
    <input type="text" name="bio" value="{{$bio}}">

    <p>Icon Image</p>
    <input type="file" name="icon-image" accept="image/png, image/jpeg">

    <br/>

    <input type="submit" value="更新">
  </form>
</div>


@endsection
