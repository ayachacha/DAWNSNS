@extends('layouts.login')

@section('content')

<p class="title"> Follow List</p>
<div class="icon-list">
  <!-- アイコンの表示 -->
  @foreach($follows as $follow)
  <tr>
    <!-- <td>{{$follow->username}}</td> -->
    <td><a class="icon-image" href="/profile/{{$follow->id}}"><img src="{{asset('storage/'. $follow->images)}}" alt="アイコン画像"></a></td>
  </tr>
  @endforeach
</div>

</br>

<!-- 投稿の表示 -->
@foreach($posts as $post)
<tr>
  <td><a class="icon-image" href="/profile/{{$follow->id}}"><img src="{{asset('storage/'. $post->images)}}" alt="アイコン画像"></a></td>
  <td>{{$post->username}}</td>
  <td>{{$post->posts}}</td>
  <td>{{$post->created_at}}</td>
  </br>
</tr>
@endforeach

@endsection
