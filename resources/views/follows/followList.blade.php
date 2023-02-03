@extends('layouts.login')

@section('content')

@foreach($users as $user)
<div>
  <div>{{ $user->username }}</div>
  <button onclick = "follow({{ $user->id}} )">フォローする</button>
</div>
@endforeach

@endsection
