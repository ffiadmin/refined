<?php
//Include the theme core
	require_once(dirname(__FILE__) . "/config.php");
	
//Grab and generate the listing of pages
	$list = "";
	$pages = get_pages(array(
		"hierarchical" => 0,
		"parent" => 0,
		"sort_column" => "menu_order",
		"sort_order" => "ASC"
	));
	
	foreach($pages as $page) {
		$URL = get_page_link($page->ID);
		
		if ($GLOBALS['highlight'] == "") {
			$class = is_page($page->ID) ? " class=\"active\"" : "";
		} else {
			$class = (strtolower(rtrim($URL, "/")) == strtolower(rtrim($GLOBALS['highlight'], "/"))) ? " class=\"active\"" : "";
		}
		
		$list .= "<li" . $class . "><a" . $class . " href=\"" . $URL . "\">" . $page->post_title . "</a></li>
";
	}

//Get the week number, to swap between the two different profile icons
	$profiles = array("profile-me", "profile-em");
	$date = new DateTime();
	$weekRand = $date->format("W") % 2;

//Add the user login status to the navigation bar
	if (is_user_logged_in()) {
		global $current_user;
		get_currentuserinfo();
		
		$list .= "<li class=\"account logged-in " . $profiles[$weekRand] . "\"><span>" . $current_user->first_name . " " . $current_user->last_name . "</span></li>
";
	} else {
		$list .= "<li class=\"account " . $profiles[$weekRand] . "\"><a href=\"" . get_site_url() . "/wp-login.php?redirect_to=" . urlencode($_SERVER['REQUEST_URI']) . "\">Login</a></li>
";
	}

//Choose between two "Did you know" facts
	$fact = mt_rand(0, 1);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title><?php is_front_page() ? bloginfo("name") : wp_title(""); ?></title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true">
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="shortcut icon" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/favicon.ico" />
<link rel="apple-touch-icon" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/mobile/favicon-57.jpg" />
<link rel="apple-touch-icon" sizes="72×72" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/mobile/favicon-72.jpg" />
<link rel="apple-touch-icon" sizes="114×114" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/mobile/favicon-114.jpg" />
<link rel="apple-touch-startup-image" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/mobile/large-landscape.jpg" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
<link rel="apple-touch-startup-image" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/mobile/large-portrait.jpg" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
<link rel="apple-touch-startup-image" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/mobile/small-landscape.jpg"  media="screen and (max-device-width: 320px) and (orientation:landscape)" />
<link rel="apple-touch-startup-image" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/mobile/small-portrait.jpg"  media="screen and (max-device-width: 320px) and (orientation:portrait)" />

<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="<?php echo FFI\RF\RESOURCE_PATH; ?>styles/main.css">
<script src="<?php echo FFI\RF\RESOURCE_PATH; ?>scripts/template.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>

<?php wp_head(); ?>
</head>

<body>
<header id="main">
<h1><?php echo wp_title(""); ?></h1>
<a class="logo" href="<?php echo FFI\RF\HOME; ?>"></a>

<nav>
<h2>Site Navigation</h2>

<ul>
<?php echo $list; ?></ul>
</nav>

<div class="support"><a href="https://forwardfour.uservoice.com/clients/widgets/classic_widget" target="_blank"><h2>Support</h2></a></div>
</header>

<?php
	if (is_user_logged_in()) {
?>
<aside class="account">
<section class="person">
<h2>Hello, <?php echo $current_user->first_name; ?>!</h2>

<nav>
<ul>
<li class="logout"><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
<li class="<?php echo $profiles[$weekRand]; ?>"><a href="<?php echo FFI\RF\HOME; ?>/wp-admin/profile.php">My Account</a></li>
<li class="books"><a href="<?php echo FFI\RF\HOME; ?>/wp-admin/profile.php#book-exchange">My Books</a></li>
<li class="trips"><a href="<?php echo FFI\RF\HOME; ?>/wp-admin/profile.php#travel-assistant">My Trips</a></li>
</ul>
</nav>
</section>
	
<section class="facts">
<h2>Did you know?</h2>
	
<?php
	if ($fact) {
?>
<span class="responsive"></span>
<p>Our site works great on your mobile device, too! Try it out on your tablet or mobile phone sometime.</p>
<?php
	} else {
?>
<p>Our entire site is built on top of <a href="http://wordpress.org" target="_blank">Wordpress</a>. We've also open sourced our code for all of our plugins, such as the <a href="https://github.com/ffiadmin/book-exchange" target="_blank">book exchange</a> and <a href="https://github.com/ffiadmin/travel-assistant" target="_blank">travel assistant</a>. You can find all of them, and more, on Github.</p>
<a class="github" href="https://github.com/ffiadmin/" target="_blank">Github Projects</a>
<?php
	}
?>
</section>
	
<section class="credits">
<p>Designed and developed by <a href="mailto:sprynoj1@gcc.edu">Oliver Spryn</a></p>
</section>
	
<span class="close"></span>
</aside>

<?php
	}
?>