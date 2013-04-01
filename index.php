<?php
	include(dirname(__FILE__) . "/config.php");

//Grab the page contents
	$title = "";

	if (have_posts()) {
		 while (have_posts()) {
			 the_post();
		 }
		
		$title = get_the_title();
		get_header();
		the_content();
		get_footer();
	} else {
		$title = "Page not found";
		get_header();
		get_footer();
	}
?>