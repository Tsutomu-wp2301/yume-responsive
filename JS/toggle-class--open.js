
// スマートフォンのハンバーガーメニュー
// Menuボタンを押したらis-activクラスを付ける

$(document).ready(function() {
  // ボタンがクリックされた時の処理
  $("#toggleButton").on("click", function() {
    /* ボタンの挙動 */
    $(this).toggleClass("open");
    /* メニュー展開 */
    $(".p-global-nav--sp").toggleClass("open");
    /* グレーの背景展開 */
    $(".c-background--menu").toggleClass("open");
    /* スクロール禁止 */
    $("body").toggleClass("open");
  });
});




