
$(document).ready(function () {
	$(".p-banner--container")
		.on("mouseenter", function () {
			$(this).addClass("hover_banner"); // Add "hover" class on hover
		})
		.on("mouseleave", function () {
			$(this).removeClass("hover_banner"); // Remove "hover" class on mouseleave
		});
});

$(document).ready(function () {
	$(".p-banner2--container")
		.on("mouseenter", function () {
			$(this).addClass("hover_banner"); // Add "hover" class on hover
		})
		.on("mouseleave", function () {
			$(this).removeClass("hover_banner"); // Remove "hover" class on mouseleave
		});
});
