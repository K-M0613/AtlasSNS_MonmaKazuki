@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
{!! Form::open(['url' => '/post']) !!}
<div class="form-text">
  {{ Form::text('post', null,['class' => 'post_form', 'required', 'placeholder' => '投稿内容を入力してください。'])}}
</div>
<input type="image" id="image" alt="投稿" src="../images/post.png" />
@foreach ($posts as $post)
  <div class="post-container">
    <img src="{{ asset('images/' . $post->users->images) }}" id="post-user-image"/>
    <h5>{{ $post->users->username }}</h5>
    <p class="post-time">{{ $post->created_at }}</p>
    <p class="post-content">{{ $post->post }}</p>
  </div>
@endforeach
@endsection
