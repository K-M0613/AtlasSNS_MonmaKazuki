@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>{{ session('username') }}さん</p> <!--一時的に保存したデータを表示-->
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
