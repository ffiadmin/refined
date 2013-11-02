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
		
	//Generate the sidebar links
		$links = "";
	
		if (!empty($post->post_parent)) {
			$links = "<li class=\"back\"><a href=\"" . get_permalink($post->post_parent) . "\">Back to " . get_the_title($post->post_parent) . "</a></li>\n";
		}
	
		$links .= wp_list_pages('title_li=&depth=1&child_of='.$post->ID.'&echo=0');
	
		if (!empty($links)) {
			echo "

<article class=\"more\">
<h3>Explore more:</h3>

<ul>
" . $links . "
</ul>
</article>";
		}
	}

	get_footer();
?>