jQuery(function ($) {
	"use strict";
	setTimeout(function () {
		var $cameraWrap = $('#camera_wrap_1'),
			$controls = $cameraWrap.find('.camera_pag_ul > li'),
			$textControls = $('.camera_text_thumbs li'),
			size = $textControls.size(),
			camera = $cameraWrap.data('camera');
		$textControls.css('width', 100/size + '%').click(function () {
			if (!camera.isAnimating()) {
				camera.goto($(this).index());
				$textControls.removeClass('active');
				$(this).addClass('active');
			}
		});

		camera.options.onEndTransition = function () {
			var index = $cameraWrap.find('.camera_target .cameraSlide.cameracurrent').index();
			$textControls.removeClass('active').eq(index).addClass('active');
		}
	}, 10);

});