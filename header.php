<?php require_once(dirname(__FILE__) . "/config.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php is_front_page() ? bloginfo("name") : wp_title(""); ?></title>
<link rel="shortcut icon" href="<?php echo FFI\RF\RESOURCE_PATH; ?>images/favicon.ico"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="<?php echo FFI\RF\RESOURCE_PATH; ?>styles/main.min.css">
</head>

<body>
<header id="main">
<h1><?php echo wp_title(""); ?></h1>
<a class="logo" href="<?php echo FFI\RF\HOME; ?>"></a>

<nav>
<h2>Site Navigation</h2>

<ul>
<?php wp_list_pages(array("depth" => 1, "title_li" => "")); ?>
</ul>
</nav>

<div class="support"><a href="https://forwardfour.uservoice.com/clients/widgets/classic_widget" target="_blank"><h2>Support</h2></a></div>
</header>
	
