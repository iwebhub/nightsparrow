
function toggle() {
	var title = $('.single > h2');
	var text = $('.single > ul').hide();
	title.on('click', function() {
		text.stop().slideUp(300);
		$(this).next().stop().slideToggle(300);
	});
}

$(document).ready(function() {
	toggle();
})