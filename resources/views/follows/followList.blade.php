@extends('layouts.login')

@section('content')

@foreach($follows as $follow)
<div>
  <div>{{ $follow->follow }}</div>
</div>
@endforeach

@endsection
