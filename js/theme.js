$(document).ready(function() {
	addEventListener("load", function() {
	setTimeout(hideURLbar, 0);
	},
	false);

	function hideURLbar() {
		window.scrollTo(0,1); 
	}

	$( "span.menu" ).click(function() {
		$( "ul.nav1" ).slideToggle( 300, function() {
		// Animation complete.
		});
	});
	
});