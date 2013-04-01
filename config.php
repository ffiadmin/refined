<?php
	namespace FFI\RF;

//Create template-specific global definitions
	define("FFI\RF\CDN", true);
	define("FFI\RF\HOME", site_url());
	define("FFI\RF\PATH", dirname(__FILE__));
	define("FFI\RF\RESOURCE_PATH", (CDN ? "//ffistatic.appspot.com/sga" : site_url()) . "/wp-content/themes/refined/");
?>