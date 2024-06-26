@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile']) !!}
{{ Form::hidden('id', $user->id) }}
<ul>
  <li>{{ Form::label('username', 'ユーザー名') }}</li>
  <li>{{ Form::text('username', $user->username) }}</li>
  @if ($errors->first('username'))
    <p class="alert alert-danger">※{{$errors->first('username')}}</p>
  @endif
  <li>{{ Form::label('mail', 'メールアドレス') }}</li>
  <li>{{ Form::text('mail', $user->mail) }}</li>
  @if ($errors->first('mail'))
    <p class="alert alert-danger">※{{$errors->first('mail')}}</p>
  @endif
  <li>{{ Form::label('password', 'パスワード') }}</li>
  <li>{{ Form::password('password', $user->password) }}</li>
  @if ($errors->first('password'))
    <p class="alert alert-danger">※{{$errors->first('password')}}</p>
  @endif
  <li>{{ Form::label('password_confirmation', 'パスワード確認') }}</li>
  <li>{{ Form::password('password_confirmation', null) }}</li>
  @if ($errors->first('password_confirmation'))
    <p class="alert alert-danger">※{{$errors->first('password_confirmation')}}</p>
  @endif
  <li>{{ Form::label('bio', '自己紹介') }}</li>
  <li>{{ Form::text('bio', $user->bio) }}</li>
  @if ($errors->first('bio'))
    <p class="alert alert-danger">※{{$errors->first('bio')}}</p>
  @endif
</ul>
<div class="w-25">
  {{ Form::submit('更新する', ['class' => 'btn btn-danger btn-sm']) }}
</div>
{!! Form::close() !!}

@endsection
