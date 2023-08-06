/* メディア情報一覧　リストの表示・非表示 */
/* タブをクリックしたらリストにselectクラスを付与する */
/* クリックしたら他のタブのselectクラスを外す */



/* 「すべて」タブをクリックした時の挙動 */
$(document).ready(function() {
  // ボタンがクリックされた時の処理
  $("#media-tab--all").on("click", function() {
    $("#media-list--all").addClass("select");
    $("#media-list--super").removeClass("select");
    $("#media-list--kasukabe").removeClass("select");
    $("#media-list--hirakata").removeClass("select");
    $("#media-list--uchimaki").removeClass("select");
  });
});

/* 「スーパー」タブをクリックした時の挙動 */
$(document).ready(function() {
  // ボタンがクリックされた時の処理
  $("#media-tab--super").on("click", function() {
    $("#media-list--super").addClass("select");
    $("#media-list--all").removeClass("select");
    $("#media-list--kasukabe").removeClass("select");
    $("#media-list--hirakata").removeClass("select");
    $("#media-list--uchimaki").removeClass("select");
  });
});


/* 「かすかべ」タブをクリックした時の挙動 */
$(document).ready(function() {
  // ボタンがクリックされた時の処理
  $("#media-tab--kasukabe").on("click", function() {
    $("#media-list--kasukabe").addClass("select");
    $("#media-list--super").removeClass("select");
    $("#media-list--all").removeClass("select");
    $("#media-list--hirakata").removeClass("select");
    $("#media-list--uchimaki").removeClass("select");
  });
});


/* 「平方」タブをクリックした時の挙動 */
$(document).ready(function() {
  // ボタンがクリックされた時の処理
  $("#media-tab--hirakata").on("click", function() {
    $("#media-list--hirakata").addClass("select");
    $("#media-list--super").removeClass("select");
    $("#media-list--kasukabe").removeClass("select");
    $("#media-list--all").removeClass("select");
    $("#media-list--uchimaki").removeClass("select");
  });
});


/* 「内牧」タブをクリックした時の挙動 */
$(document).ready(function() {
  // ボタンがクリックされた時の処理
  $("#media-tab--uchimaki").on("click", function() {
    $("#media-list--uchimaki").addClass("select");
    $("#media-list--super").removeClass("select");
    $("#media-list--kasukabe").removeClass("select");
    $("#media-list--hirakata").removeClass("select");
    $("#media-list--all").removeClass("select");
  });
});