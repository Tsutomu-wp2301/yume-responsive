// ホバーした要素にクラス名hoverをつけ外しする

$(document).ready(function() {
  $(".c-qalist").on("mouseenter", function() {
    $(this).addClass("hover"); // Add "hover" class on hover
  }).on("mouseleave", function() {
    $(this).removeClass("hover"); // Remove "hover" class on mouseleave
  });
});