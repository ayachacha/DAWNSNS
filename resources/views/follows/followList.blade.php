@extends('layouts.login')

@section('content')

<!-- アイコンの表示 -->
@foreach($follows as $follow)
<tr>
  <!-- <td>{{$follow->username}}</td> -->
  <td><img src="{{asset('storage/'. $follow->images)}}" alt="アイコン画像"></td>
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
