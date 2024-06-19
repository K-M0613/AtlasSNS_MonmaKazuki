@extends('layouts.login')

@section('content')

{!! Form::open('url' => '/profile') !!}
{!! Form::hidden('id', $user->id) !!}
<ul>
  <li>{{!! Form::label('ユーザー名') !!}}</li>
  <li>{{ From::text('username',$user->username) !!}}</li>
  @if ($error->first('username'))
    <p class="alert alert-danger">※{{$errors->first('username')}}</p>
  @endif
  <li>{{!! Form::label('メールアドレス') !!}}</li>
  <li>{{!! From::text('mail', $user->mail) !!}}</li>
  @if ($error->first('mail'))
    <p class="alert alert-danger">※{{$errors->first('mail')}}</p>
  @endif
  <li>{{!! Form::label('パスワード') !!}}</li>
  <li>{{!! Form::password('password', $user->password) !!}}</li>
  @if ($error->first('password'))
    <p class="alert alert-danger">※{{$errors->first('password')}}</p>
  @endif
  <li>{{!! Form::label('パスワード確認') !!}}</li>
  <li>{{!! Form::password('password_confirmation', null) !!}}</li>
  @if ($error->first('password_confirmation'))
    <p class="alert alert-danger">※{{$errors->first('password_confirmation')}}</p>
  @endif
  <li>{{!! Form::label('自己紹介') !!}}</li>
  <li>{{!! Form::text('bio', $user->bio) !!}}</li>
  @if ($error->first('bio'))
    <p class="alert alert-danger">※{{$errors->first('bio')}}</p>
  @endif
</ul>
<div class="w-25">
  {{!! Form::submit('更新する', ['class' => 'btn btn-danger btn-sm']) !!}}
</div>
{!! Form::close() !!}

@endsection
