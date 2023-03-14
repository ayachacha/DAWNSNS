@extends('layouts.login')

@section('content')

@foreach($userPosts as $userPost)
<table>
  <tr>
    <td>{{ $userPost->posts }}</td>
  </tr>
</table>
@endforeach

@endsection
