@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/post', 'class' => 'post_container']) !!}
<figure><img src="{{ asset('images/'.auth::User()->images) }}"id="user-image"/></figure>
<div class="form-text">
  {{ Form::text('post', null,['class' => 'post_form form-control form-control-lg', 'required', 'placeholder' => '投稿内容を入力してください。'])}}
  <input type="image" id="image" alt="投稿" src="../images/post.png" />
</div>
{!! Form::close() !!}
@foreach ($posts as $post)
  <div class="post_index">
    <ul>
      <li class="post-block">
        <figure><img src="{{ asset('images/' . $post->user->images) }}" id="post-user-image"/></figure>
        <div class="post-content">
          <div>
            <div class="post-name">{{ $post->user->username }}</div>
            <div>{{ $post->created_at }}</div>
          </div>
          <div>{{ $post->post }}</div>
        </div>

          @if (Auth::id() === $post->user_id)
            <div class="action-button">
              <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="../images/edit.png" id="post-edit"></a>
              <a href="/post/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')"><img src="../images/trash-h.png" onmouseover="this.src='../images/trash.png'" onmouseout="this.src='../images/trash-h.png'" id="post-delete"></a>
            </div>
          @endif
      </li>
    </ul>
  </div>
@endforeach
<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal_bg js-modal-close"></div>
  <div class="modal_content">
    <form action="post/{id}/update" method="post">
      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="{{ $post->post }}">
      <input type="submit" value="更新">
      {{ csrf_field() }}
    </form>
    <a class="js-modal-close" href=""><img src="../images/edit.png" id="close-modal"></a>
  </div>
</div>
@endsection
