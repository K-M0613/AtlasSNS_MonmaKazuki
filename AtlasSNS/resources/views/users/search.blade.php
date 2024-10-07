@extends('layouts.login')
@section('content')
{!! Form::open(['url' => '/search']) !!}
<div>
  {{ Form::text('username', $searchWord) }}
</div>
<div>
  <input type="image" src="/images/search.png">
</div>
{!! Form::close() !!}
<div>
  @foreach($finds as $find)
  <ul>
    <li>
      <img src="{{ asset('images/'.$find->images) }}"/>
    </li>
    <li>
      <p>{{$find->username}}</p>
    </li>
    <li>
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
