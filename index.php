<?php
	require_once(dirname(__FILE__) . "/config.php");

//Grab the page contents, 404.php will be called in the case of a 404 error
	while (have_posts()) {
		the_post();
	}
	
	$title = get_the_title();
	get_header();
	
//Print out a shaded content area if there isn't a ForwardFour Innovations plugin running on this page
	if (!defined("FFI\PLUGIN_PAGE")) {
		echo "<section class=\"content no-splash\">
<h1>" . $title . "</h1>
";
	}

	the_content();
	
	if (!defined("FFI\PLUGIN_PAGE")) {
		echo "
</section>";
	}

	get_footer();
?>