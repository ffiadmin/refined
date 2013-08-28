<?php
	namespace FFI\RF;

//Create template-specific global definitions
	define("FFI\RF\CDN", false);
	define("FFI\RF\HOME", site_url());
	define("FFI\RF\PATH", dirname(__FILE__));
	define("FFI\RF\RESOURCE_PATH", (CDN ? "//ffistatic.appspot.com/sga" : site_url()) . "/wp-content/themes/refined/");

//Remove the admin bar, the theme will provide one
	remove_action("wp_head", "_admin_bar_bump_cb");
	remove_action("wp_head", "wp_admin_bar_header");
	remove_action("wp_footer", "wp_admin_bar_render", 1000);
	show_admin_bar(false);     
	wp_deregister_script("admin-bar");
	wp_deregister_style("admin-bar");
	
//Remove all of the Wordpress junk from the wp_head() function
	remove_action("wp_head", "adjacent_posts_rel_link_wp_head", 10, 0);
	remove_action("wp_head", "feed_links", 2);
	remove_action("wp_head", "feed_links_extra", 3);
	remove_action("wp_head", "index_rel_link");
	remove_action("wp_head", "rsd_link");
	remove_action("wp_head", "parent_post_rel_link", 10, 0);
	remove_action("wp_head", "rel_canonical");
	remove_action("wp_head", "start_post_rel_link", 10, 0);
	remove_action("wp_head", "wlwmanifest_link");
	remove_action("wp_head", "wp_generator");
?>
