
// ヘッダーメニューホバー時にopenクラスをつけ外しする

$(document).ready(function() {
  $('.c-menu-item').on('mouseenter', function() {
    $(this).addClass('open');
  }).on('mouseleave', function() {
    $(this).removeClass('open');
  });
});
