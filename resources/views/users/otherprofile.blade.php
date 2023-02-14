
<img src="/storage/{{$user->images}}" alt="">
<div>
  {{$user->username}}
</div>
<div>
  {{$user->bio}}
</div>
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


@foreach($posts as $post)
  <img src="/storage/{{$post->images}}" alt="">
  {{$post->username}}
  {{$post->posts}}
  {{$post->created_at}}
@endforeach
