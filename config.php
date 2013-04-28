<?php
	namespace FFI\RF;

//Create template-specific global definitions
	define("FFI\RF\CDN", false);
	define("FFI\RF\HOME", site_url());
	define("FFI\RF\PATH", dirname(__FILE__));
	define("FFI\RF\RESOURCE_PATH", (CDN ? "//ffistatic.appspot.com/sga" : site_url()) . "/wp-content/themes/refined/");
	
//Remove the admin bar, the theme will provide one
	function removeMargin() { // css override for the frontend  
		echo "<style>html {margin-top: 0px !important;} * html body {margin-top: 0px !important;}</style>
";  
    }
	
	add_filter("show_admin_bar", "__return_false");      
    add_filter("wp_head", "FFI\RF\\removeMargin", 99);  
?>