<?php
	namespace FFI\RF;

//Create template-specific global definitions
	define("FFI\RF\CDN", false);
	define("FFI\RF\HOME", site_url());
	define("FFI\RF\PATH", dirname(__FILE__));
	define("FFI\RF\RESOURCE_PATH", (CDN ? "//ffistatic.appspot.com/sga" : site_url()) . "/wp-content/themes/refined/");
	
//Remove the admin bar, the theme will provide one
	function removeMargin() { // CSS override for the frontend portion of the site 
		echo "<style>html {margin-top: 0px !important;} * html body {margin-top: 0px !important;}</style>
";  
    }
	
	show_admin_bar(false);     
    add_filter("wp_head", "FFI\RF\\removeMargin", 99);
	wp_deregister_script("admin-bar");
	wp_deregister_style("admin-bar");
	remove_action("wp_footer", "wp_admin_bar_render", 1000);
?>