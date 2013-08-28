<?php
	$pages = get_pages(array("sort_column" => "menu_order"));
	$info = array("0" => array()); //The inner array with a key of 0 will hold all of the top-level pages
	
	for ($i = 0; $i < count($pages); ++$i) {
		$parent = $pages[$i]->post_parent;
		$ID = $pages[$i]->ID;
		$title = $pages[$i]->post_title;
		$URL = $pages[$i]->guid;
		
	//Create the array which will hold the child pages whose parent is indicated by the key
		!array_key_exists($parent, $info) ? $info[$parent] = array() : TRUE;
		
	//Push the page data onto the info array
		array_push($info[$parent], array("ID" => $ID,"title" => $title, "URL" => $URL));
	}
?>


<footer id="bottom">
<nav>
<ul class="navigation"><?php
	$TLPages = $info[0];
	
	for ($i = 0; $i < count($TLPages); $i++) {
		echo "
<li>
<ul class=\"links\">
<li><a href=\"" . $TLPages[$i]['URL'] . "\">" . $TLPages[$i]['title'] . "</a></li>
";

	//Display subpages
		if (array_key_exists($TLPages[$i]['ID'], $info)) {
			$data = $info[$TLPages[$i]['ID']];
			
			for($j = 0; $j < count($data); $j++) {
				echo "<li><a href=\"" . $data[$j]['URL'] . "\">" . $data[$j]['title'] . "</a></li>
";
			}
		}

echo "</ul>
</li>
";
	}
?>

<li>
<ul class="promotion">
<li>
<a class="page facebook" href="https://www.facebook.com/pages/Student-Government-Association-at-Grove-City-College/149828851728032" target="_blank"></a>
<a class="page twitter" href="https://twitter.com/sgaatgcc" target="_blank"></a>
<a class="email" href="mailto:sga@gcc.edu" target="_blank">sga@gcc.edu</a>
</li>

<li>
<a class="link HTML5" href="http://www.w3.org/html/logo/" target="_blank"></a>
<a class="link CSS3" href="http://www.w3.org/Style/CSS/" target="_blank"></a>
<a class="link ForwardFour" href="https://github.com/ffiadmin/" target="_blank"></a>
</li>
</ul>
</li>
</ul>
</nav>

<ul class="mega-footer">
<li>Established in 1924</li>
<li class="logo"></li>
<li>Handmade at GCC</li>
</ul>
</footer>
<?php wp_footer(); ?>
</body>
</html>