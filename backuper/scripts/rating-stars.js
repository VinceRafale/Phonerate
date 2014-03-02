$(document).ready(function () {
	$('#star1').click(function(){
		$('#label-star2').removeClass('checkradio');
		$('#label-star3').removeClass('checkradio');
		$('#label-star4').removeClass('checkradio');
		$('#label-star5').removeClass('checkradio');

		$('#label-star2').addClass('radio');
		$('#label-star3').addClass('radio');
		$('#label-star4').addClass('radio');
		$('#label-star5').addClass('radio');

    	$('#label-star1').addClass('radio');
	});

	$('#star2').click(function(){
		$('#label-star1').removeClass('radio');

		$('#label-star1').removeClass('checkradio');
		$('#label-star3').removeClass('checkradio');
		$('#label-star4').removeClass('checkradio');
		$('#label-star5').removeClass('checkradio');

		$('#label-star3').addClass('radio');
		$('#label-star4').addClass('radio');
		$('#label-star5').addClass('radio');

    	$('#label-star1').addClass('checkradio');
    	$('#label-star2').addClass('radio');
	});

	$('#star3').click(function(){
		$('#label-star1').removeClass('radio');
		$('#label-star2').removeClass('radio');

		$('#label-star1').removeClass('checkradio');
		$('#label-star2').removeClass('checkradio');
		$('#label-star4').removeClass('checkradio');
		$('#label-star5').removeClass('checkradio');

		$('#label-star').addClass('radio');
		$('#label-star4').addClass('radio');
		$('#label-star5').addClass('radio');

    	$('#label-star1').addClass('checkradio');
    	$('#label-star2').addClass('checkradio');
    	$('#label-star3').addClass('radio');
	});

	$('#star4').click(function(){
		$('#label-star1').removeClass('radio');
		$('#label-star2').removeClass('radio');
		$('#label-star3').removeClass('radio');

    	$('#label-star1').addClass('checkradio');
    	$('#label-star2').addClass('checkradio');
    	$('#label-star3').addClass('checkradio');
    	$('#label-star4').addClass('radio');
	});

	$('#star5').click(function(){
		$('#label-star1').removeClass('radio');
		$('#label-star2').removeClass('radio');
		$('#label-star3').removeClass('radio');
		$('#label-star4').removeClass('radio');

    	$('#label-star1').addClass('checkradio');
    	$('#label-star2').addClass('checkradio');
    	$('#label-star3').addClass('checkradio');
    	$('#label-star4').addClass('checkradio');
    	$('#label-star5').addClass('radio');
	});
});