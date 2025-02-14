function start($section) {
	$link = '#n' + $section.substring(0, 1).toUpperCase() + $section.substring(1, $section.length);
	$($link).addClass('active');
	$('.section:not(#' + $section + ')').hide();
}

function update($link, $section) {
	$('#navigation a').removeClass('active');
	$link.addClass('active');
	$('.warning:visible').remove();
	$('.section:visible').fadeOut(600, function() {
		$($section).fadeIn(1000);
	});
}

$(document).ready(function () {
	$('#navigation a').click(function() {
		$id = $(this).attr('id');
		update($(this), '#' + $id.substring(1, $id.length).toLowerCase());
	});
	
	$('#formContact').submit(function() {
		var $valid = true;
		$('#contact .warning:visible').remove();
		if ($('#inputContactName').val() == '') $valid = false;
		if ($('#inputContactEmail').val() == '') $valid = false;
		if ($('#inputContactSubject').val() == '') $valid = false;
		if ($('#inputContactMessage').val() == '') $valid = false;
		if (!$valid) $('#formContact').before('<p class="warning">Please complete all required fields</p>');
		$('#contact .warning').fadeIn(1000);
		return $valid;
	});
	
	$('#portfolio > div').addClass('ie6');
	$('#portfolio > div')
        .before('<span id="scrollLeft" class="scrollButton">left</span>')
        .after('<span id="scrollRight" class="scrollButton">right</span>');
    $('.scrollButton').hover(function() {$(this).addClass('hover');}, function() {$(this).removeClass('hover');});
	
	$('#portfolio > div').jCarouselLite({
        btnNext: '#scrollRight',
        btnPrev: '#scrollLeft',
        scroll: 1,
        visible: 1,
        circular: true,
        easing: 'swing',
        speed: 400
    });

	$('#portfolio2 > div').addClass('ie6');
	$('#portfolio2 > div')
        .before('<span id="scrollLeft" class="scrollButton">left</span>')
        .after('<span id="scrollRight" class="scrollButton">right</span>');
    $('.scrollButton').hover(function() {$(this).addClass('hover');}, function() {$(this).removeClass('hover');});
	
	$('#portfolio2 > div').jCarouselLite({
        btnNext: '#scrollRight',
        btnPrev: '#scrollLeft',
        scroll: 1,
        visible: 1,
        circular: true,
        easing: 'swing',
        speed: 400
    });

});
