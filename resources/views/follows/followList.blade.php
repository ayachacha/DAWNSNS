@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<tr>
  <!-- <td>{{$follow->username}}</td> -->
  <td><img src="{{asset('storage/'. $follow->images)}}" alt=""></td>
</tr>
@endforeach

@foreach($posts as $post)
<tr>
  <td>{{$post->posts}}</td>
</tr>
@endforeach

@endsection
