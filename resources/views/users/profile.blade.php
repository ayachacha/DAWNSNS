@extends('layouts.login')

@section('content')

<div id="profile-edit">
  <a class="icon-image"><img src="{{ asset('/storage/' . Auth::user()->images) }}" alt="プロフィール画像"></a>
  <form action="/profile/update" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id">

  <div class="profile">
    <p>UserName</p>
    <input type="text" name="username" value="{{$username}}">
    @if($errors->has('username'))
    {{ $errors->first('username')}}
    @endif
  </div>

  <div class="profile">
    <p>MailAddress</p>
    <input type="email" name="mail" value="{{$mail}}">
    @if($errors->has('mail'))
    {{ $errors->first('mail')}}
    @endif
  </div>

  <div class="profile">
    <p>Password</p>
    <input type="password" name="password" value="{{$password}}" disabled>
  </div>

  <div class="profile">
    <p>new Password</p>
    <input type="password" name="newPassword" value="">
    @if($errors->has('newPassword'))
    {{ $errors->first('newPassword')}}
    @endif
  </div>

  <div class="profile">
    <p>Bio</p>
    <input type="text" name="bio" value="{{$bio}}">
  </div>

  <div class="profile">
    <p>Icon Image</p>
    <input type="file" name="icon-image" accept="image/png, image/jpeg">
  </div>

    <br/>

    <input class="btn" type="submit" value="更新">
  </form>
</div>


@endsection
