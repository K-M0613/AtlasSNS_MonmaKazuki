@extends('layouts.login')
@section('content')
{!! Form::open(['url' => '/search']) !!}
<div class="search_border">
  <div class="search-text">
    {{ Form::text('username', $searchWord,['class' => ' form-control search-form']) }}
    <input type="image" src="/images/search.png" id="searchImg">
    @if (!empty($searchWord))
      <p class="search-word">検索ワード:{{ $searchWord }}</p>
    @endif
  </div>
</div>
{!! Form::close() !!}
<div class="search_result">
  @foreach($finds as $find)
  <ul>
    <li>
      <img src="{{ asset('images/'.$find->images) }}"/>
    </li>
    <li class="username_list">
      <p class="username">{{$find->username}}</p>
    </li>
    <li class="followBtn">
      @if (!auth()->user()->isFollowing($find->id))
      <form action="{{route('follow', ['id' => $find->id])}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">フォローする</button>
      </form>
      @else
        <form action="{{route('unfollow', ['id' => $find->id])}}" method="post">
          @csrf
          <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @endif

    </li>
  </ul>
  @endforeach
</div>



@endsection
