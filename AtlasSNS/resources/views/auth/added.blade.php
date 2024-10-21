@extends('layouts.logout')

@section('content')

<div id="clear" class="register">
  <p class="name">{{ session('username') }}さん</p> <!--一時的に保存したデータを表示-->
  <p class="welcome-text">ようこそ！AtlasSNSへ！</p>
  <p class="complete">ユーザー登録が完了しました。</p>
  <p class="try-login">早速ログインをしてみましょう。</p>
  <div class="link-btn">
    <p class="btn btn-danger"><a href="/login" style="border: none;">ログイン画面へ</a></p>
  </div>
</div>

@endsection
