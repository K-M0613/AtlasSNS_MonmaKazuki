@extends('layouts.logout')

@section('content')
<div class="register">
  <div class="login">
    <p class="welcome">新規ユーザー登録</p>
  </div>
  {!! Form::open(['url' => 'register', 'method' => 'post']) !!}
  <ul>
    <li class="name_title">{{ Form::label('ユーザー名') }}</li>
    <li class="name_form a">{{ Form::text('username',null,['class' => 'output']) }}</li>
    @if ($errors->first('username'))
        <p class="alert alert-danger">※{{$errors->first('username')}}</p>
    @endif
    <li class="mail_title">{{ Form::label('メールアドレス') }}</li>
    <li class="mail_form a">{{ Form::text('mail',null,['class' => 'output']) }}</li>
    @if ($errors->first('mail'))
        <p class="alert alert-danger">※{{$errors->first('mail')}}</p>
    @endif
    <li class="pass_title">{{ Form::label('パスワード') }}</li>
    <li class="pass_form a">{{ Form::password('password',null,['class' => 'output']) }}</li>
    @if ($errors->first('password'))
        <p class="alert alert-danger">※{{$errors->first('password')}}</p>
    @endif
    <li>{{ Form::label('パスワード確認') }}</li>
    <li class="pass_form a">{{ Form::password('password_confirmation',null,['class' => 'output']) }}</li>
    @if ($errors->first('password_confirmation'))
        <p class="alert alert-danger">※{{$errors->first('password_confirmation')}}</p>
        @endif
      </ul>
      <input type="submit" value="新規登録" class="btn btn-danger btn-sm" style="margin-left: 200px;">
      <!-- {{ Form::submit('新規登録', ['class' => 'register_button']) }} -->
      <p class="new_user"><a href="/login">ログイン画面へ戻る</a></p>
    </div>
{!! Form::close() !!}

@endsection
