// メニュー非表示で黒い背景をフェードイン
$(document).ready(function() {
  $('.c-button-close').on('click', function() {
    $('.c-color-board--black').fadeOut();
  });
});