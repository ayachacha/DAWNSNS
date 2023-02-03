@extends('layouts.login')

@section('content')

<div id="profile-edit">
  <form action="" method="post">
    @csrf
    <p>UserName</p>
    <input type="text" name="name" value="{{$user}}">
    <p>MailAddress</p>
    <input type="email" name="email" value="{{$email}}">
    <P>Password</P>
    <input type="password" name="password" value="{{$password}}">
    <p>new Password</p>
    <input type="password" name="password" value="">
    <p>Bio</p>
    <input type="text" name="bio" value="">
    <p>Icon Image</p>
    <input type="file" name=icon-image accept="image/png, image/jpeg">
    <br/>
    <input type="submit" value="更新">
  </form>
</div>


@endsection
