@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
<form action="{{ url('/search') }}" method="GET">
  {{ csrf_field() }}
  {{ method_field('get') }}
  <div class="form-group">
    <labe>名前</labe>
    <input type="text" class="form-control col-md-5" placeholder="ユーザー名" name="keyword" value="{{$keyword}}">
  </div>

  <button type="submit" class="btn btn-primary col-md-5">検索</button>
</form>

<div style="margin-top:50px;">
<table class="table">
  <tr>
    <th>ユーザー名</th>
  </tr>
  @foreach($posts as $post)
  <tr>
    <td>{{ $post->username }}</td>
  </tr>
  @endforeach
</table>
</div>

@endsection
