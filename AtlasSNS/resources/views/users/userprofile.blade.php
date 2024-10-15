@extends('layouts.login')

@section('content')
@foreach ($users as $user)
<div class="search_border">
  <table class="userShowTable" cellspacing="10">
    <tr>
      <td><img src="{{ asset('/storage/images/' . $user->images) }}" /></td>
      <td style="font-size: 24px;" class="td_title">ユーザー名</td>
      <td style="font-size: 24px;">{{ $user->username }}</td>
    </tr>
    <tr>
      <td></td>
      <td style="font-size: 24px;">自己紹介</td>
      <td style="font-size: 24px;">{{ $user->bio }}</td>
    </tr>
  </table>
      <div class="followButton">
        @if (!auth()->user()->isFollowing($user->id))
          <form action="{{route('follow', ['id' => $user->id])}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @else
          <form action="{{route('unfollow', ['id' => $user->id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">フォロー解除</button>
          </form>
        @endif
      </div>
</div>
@endforeach
@foreach ($posts as $post)
<div class="post_index">
  <ul>
    <li class="post-block">
      <figure><img src="{{ asset('/storage/images/' . $user->images) }}" /></figure>
      <div class="post-content">
          <div>
            <div class="post-name">{{ $post->user->username }}</div>
            <div>{{ $post->created_at }}</div>
          </div>
          <div>{{ $post->post }}</div>
        </div>
    </li>
  </ul>
</div>
@endforeach
@endsection
