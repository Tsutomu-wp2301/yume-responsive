/* ヘッダーの表示・非表示の設定 */
/* 下スクロールによってクラス名を付与、
上方向のスクロールによってクラス名を削除 */

$(document).ready(function() {
  var targetElement = $(".p-global-nav");
  var scrollThreshold = 200; // 一定量スクロールする閾値
  var scrollPosition = 0;
  var scrollDirection = "down";

  $(window).scroll(function() {
    var currentScrollPosition = $(this).scrollTop();

    if (currentScrollPosition > scrollPosition) {
      scrollDirection = "down";
    } else {
      scrollDirection = "up";
    }

    scrollPosition = currentScrollPosition;

    if (scrollDirection === "down" && scrollPosition > scrollThreshold) {
      targetElement.addClass("headerInactive");
    } else {
      targetElement.removeClass("headerInactive");
    }
  });
});





