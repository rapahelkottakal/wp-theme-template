(function($) {

	var $menuBtn = $('.menuBtn'),
		$overlay = $('.menuOverlay'),
		$menu = $('.menu');

	//show menu on clicking btn
	$menuBtn.click(function() {
		if (!$menu.hasClass('open')) {
			$menu.addClass('open');
			$overlay.addClass('open');
		} else {
			$menu.removeClass('open');
			$overlay.removeClass('open');
		};
	});

	// console.log($('#body-background'));

	// click overlay and close menu
	$overlay.click(function() {
		if ($menu.hasClass('open')) {
			$menu.removeClass('open');
			$overlay.removeClass('open');
		};
	});

	//click body when menu open should close menu and prevent default
	// $('#body-background').click(function(e) {
	// 	console.log('click bg');
	// 	if ($menu.hasClass('open')) {
	// 		e.preventDefault();
	// 		$menu.removeClass('open');
	// 	};
	// });
})(jQuery);