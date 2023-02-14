@extends('layouts.login')

@section('content')

<!-- アイコンの表示 -->
@foreach($followers as $follower)
<tr>
  <!-- <td>{{$follower->username}}</td> -->
  <td><img src="{{asset('storage/'. $follower->images)}}" alt="アイコン画像"></td>
</tr>
@endforeach

</br>

<!-- 投稿の表示 -->
@foreach($posts as $post)
<tr>
  <td><img src="{{asset('storage/'. $post->images)}}" alt="アイコン画像"></td>
  <td>{{$post->username}}</td>
  <td>{{$post->posts}}</td>
  <!-- <td>{{$post->created_at}}</td> -->
  </br>
</tr>
@endforeach

@endsection
