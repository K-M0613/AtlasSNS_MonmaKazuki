@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<div class="content">
  <div class="login">
    <p class="welcome">AtlasSNSへようこそ</p><br>
    <ul>
      <li class="mail_title">{{ Form::label('メールアドレス') }}</li>
      <li class="mail_form">{{ Form::text('mail',null,['class' => 'input']) }}</li>
      <li class="pass_title">{{ Form::label('パスワード') }}</li>
      <li class="pass_form">{{ Form::password('password',['class' => 'input']) }}</li>
    </ul>
    {{ Form::submit('ログイン', ['class' => 'login_button']) }}<br>
    <p class="new_user"><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
</div>
{!! Form::close() !!}

@endsection
