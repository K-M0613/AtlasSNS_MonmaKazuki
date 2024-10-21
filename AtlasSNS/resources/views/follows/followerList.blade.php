@extends('layouts.login')

@section('content')
  <div class="follow-icon-list">
    <p class="follow-title">フォロワーリスト</p>
    <div class="follow-icon">
      @foreach ($users as $user)
        @if (auth::user()->images === 'icon1.png')
          <a href="{{route('userProfile', ['id' => $user->id])}}"><img src="{{asset('images/icon1.png')}}" alt="デフォルトアイコン" id="post-user-image"/></a>
        @else
          <a href="{{route('userProfile', ['id' => $user->id])}}"><img src="{{ asset('/storage/images/'.$user->images)}}" alt="アイコン" /></a>
        @endif
      @endforeach
    </div>
  </div>
  <div class="search_border"></div>
  @foreach ($posts as $post)
  <div class="post_index">
    <ul>
      <li class="post-block">
        @if (auth::user()->images === 'icon1.png')
            <figure><a href="{{route('userProfile', ['id' => $user->id])}}"><img src="{{asset('images/icon1.png')}}" alt="デフォルトアイコン" id="post-user-image"/></a></figure>
        @else
          <figure><a href="{{route('userProfile', ['id' => $user->id])}}"><img src="{{ asset('/storage/images/' . $post->user->images) }}" id="post-user-image" /></a></figure>
        @endif
        <div class="post-content">
          <div>
            <div class="post-name">{{ $post->user->username }}</div>
            <div>{{ $post->created_at }}</div>
          </div>
          <div>{!! nl2br($post->post) !!}</div>
        </div>
      </li>
    </ul>
  </div>
  @endforeach
@endsection
