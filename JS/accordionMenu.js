// クリックでリストにopenクラスを追加する

$(document).ready(function() {
  $(".c-qalist").on("click", function() {
    $(this).toggleClass("open"); // Toggle the "open" class on click
  });
});