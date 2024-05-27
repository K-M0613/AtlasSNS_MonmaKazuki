@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<div class="content">
  <div class="login">
    <p class="welcome">AtlasSNSへようこそ</p><br>
    <ul>
      <li class="mail_title">{{ Form::label('メールアドレス') }}</li>
      <li class="mail_form a">{{ Form::text('mail',null,['class' => 'input']) }}</li>
      <li class="pass_title">{{ Form::label('パスワード') }}</li>
      <li class="pass_form a">{{ Form::password('password',['class' => 'input']) }}</li>
    </ul>
    <input type="submit" value="新規登録" class="btn btn-danger btn-sm" style="margin-left: 180px;">
    <p class="create_user"><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
</div>
{!! Form::close() !!}

@endsection
