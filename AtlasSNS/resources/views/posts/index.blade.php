@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
{!! Form::open(['url' => '/post']) !!}
<div class="form-text">
  {{ Form::text('post', null,['class' => 'post_form', 'required', 'placeholder' => '投稿内容を入力してください。'])}}
</div>
<input type="image" id="image" alt="投稿" src="../images/post.png" />

@endsection
