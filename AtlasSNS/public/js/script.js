$(function () {
  $(".accordion-btn").on("click", function () {
    $(this).next().slideToggle(300);
    $(this).toggleClass("open", 300);
  });
});

$(function () {
  // 編集ボタン（class="js-modal-open"）が押されたら発火
  $('.js-modal-open').on('click', function () {
    $('.js-modal').fadeIn();  //モーダルの中身（class="js-modal"）の表示
    var post = $(this).attr('post');  //押されたボタンから投稿内容を取得し変数に格納
    var post_id = $(this).attr('post_id');  //押されたボタンから投稿のIDを取得し変数に格納（どの投稿を編集するのか特定）
    $('.modal_post').text(post);  //取得した投稿内容をモーダルの中身へ渡す
    $('.modal_id').val(post_id);  //取得した投稿のIDをモーダルの中身へ渡す
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();  //モーダルの中身（class="js-modal"）の非表示
    return false;
  });
});
