@extends('layouts.login')

@section('content')
<div class="other-profile">
  <a class="icon-image"><img src="/storage/{{$user->images}}" alt="アイコン画像"></a>
  <div class="profile">
    <p>Name</p>
    {{$user->username}}
  </div>
  <div class="profile">
    <p>Bio</p>
    {{$user->bio}}
  </div>


    @if($followings->contains('follow', $user->id))
      <tr>
        <td>
          <form action="/follow/delete" method="POST">
            @csrf
            <input type="hidden" value="{{$user->id}}" name="id">
            <input class="submit-btn-out" type="submit" value="フォローをはずす">
          </form>
        </td>
      </tr>
    @else
      <tr>
        <td>
          <form action="/follow/create" method="POST">
            @csrf
            <input type="hidden" value="{{$user->id}}" name="id">
            <input class="submit-btn-in" type="submit" value="フォローする">
          </form>
        </td>
      </tr>
    @endif
</div>

@foreach($posts as $post)
  <a class="icon-image"><img src="/storage/{{$post->images}}" alt="アイコン画像"></a>
  {{$post->username}}
  {{$post->posts}}
  {{$post->created_at}}
  </br>
@endforeach


@endsection
