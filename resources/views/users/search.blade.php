@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
<form action="/search">
  <div class="form-group">
    <labe>名前</labe>
    <input type="text" class="form-control col-md-5" placeholder="ユーザー名" name="keyword" value="{{$keyword}}">
  </div>

  <button type="submit" class="btn btn-primary col-md-5">検索</button>
</form>

<div>
<table class="table">
  <tr>
    <th>ユーザー名</th>
  </tr>
  <!-- ユーザー名一覧を出力する -->
  <!-- UsersController.phpから受け取った$usersを使う -->
  @foreach($users as $user)
  <tr>
    <td>{{ $user->username }}</td>
  </tr>
  <!-- もし$auth（ログイン者のID）とユーザーのIDが同じだったら、ボタンを表示しないようにする -->
  @if($auth != $user->id)
  <!-- followsテーブルのfollower（ログイン者）でfollowのカラムにあるユーザーIDが含まれてたら外すボタン -->
  @if($followings->contains('follow', $user->id))
  <tr>
    <td>
      <form action="/follow/delete" method="POST">
        <!-- POST送信したいときはformタグ inputのname属性のものが変数として$requestに送られていく-->
        @csrf
        <input type="hidden" value="{{$user->id}}" name="id">
        <input type="submit" value="フォローをはずす">
      </form>
    </td>
  </tr>
  <!--  -->
  @else
  <tr>
    <td>
      <form action="/follow/create" method="POST">
        @csrf
        <input type="hidden" value="{{$user->id}}" name="id">
        <input type="submit" value="フォローする">
      </form>
    </td>
  </tr>
  @endif
  <!-- $authと$user->id が同じだった場合は、フォローボタンを表示しない設定 -->
  @else
  <tr>
    <td>
    </td>
  </tr>
  @endif
  @endforeach
</table>
</div>

@endsection
