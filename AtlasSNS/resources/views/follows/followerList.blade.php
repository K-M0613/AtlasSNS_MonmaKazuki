@extends('layouts.login')

@section('content')

<div class="container">
  <div>
    <h3>フォロワーリスト</h3>
    <div>
      @foreach ($users as $user)
      <a href="{{route('userProfile', ['id' => $user->id])}}"><img src="{{ asset('/storage/images/'.$user->images)}}" alt="アイコン" /></a>
      @endforeach
    </div>
  </div>
  @foreach ($posts as $post)
  <div class="post_index">
    <ul>
      <li class="post-block">
        <figure><img src="{{ asset('/storage/images/' . $post->user->images) }}" id="post-user-image" /></figure> <!-- あとでプロフィールのリンク貼る -->
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
