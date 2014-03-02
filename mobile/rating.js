var base_url = "http://phonerate.dk/mobile/";
$(document).ready( function () {
	refreshFeed();
	refreshTop();
	refreshBottom();
	refresh();
} );

function refresh () {
	setTimeout(function () {
		refreshFeed();
		refreshTop();
		refreshBottom();
		refresh();
	}, 30000);
}

function refreshFeed () {
	$.ajax({
		url : base_url + "rating.php?type=feed"
	}).success( function ( data ) {
		$( "#feed-container" ).fadeIn( "slow", function() {
		 	$("#feed-container").html(data);
		});
	} );
}

function refreshTop () {
	$.ajax({
		url : base_url + "rating.php?type=top"
	}).success( function ( data ) {
		$( "#top-container" ).fadeIn( "slow", function() {
		 	$("#top-container").html(data);
		});
	} );
}

function refreshBottom () {
	$.ajax({
		url : base_url + "rating.php?type=bottom"
	}).success( function ( data ) {
		$( "#bottom-container" ).fadeIn( "slow", function() {
		 	$("#bottom-container").html(data);
		});
	} );
}

$(document).on('click', '[data-href]', function () {
	window.location = $(this).attr("data-href");
} );

