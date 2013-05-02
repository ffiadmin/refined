<?php
//Decide which 404 error page to display
	$rand = mt_rand(0, 3);
	$classes = array("unicorn right", "umpire right", "grades left", "dead-end left");
	$subTitle = array("Sorry, it looks like unicorns <em>and</em> this page doesn't exist",
					  "If this were a baseball game, we would have just struck out",
					  "Had this been a test, we would have failed it",
					  "Sorry if we lead you here, but this is a this dead end");
	$pageContent = array("<p>As far as unicorns go, we can only tell you <a href=\"http://answers.yahoo.com/question/index?qid=20110530153109AA3rByo\" target=\"_blank\">why they don't exist</a>. On the bright side, we can help you with the missing page mystery: just click the link below and you'll be sure to land on a page which still exists.</p>",
						 "<p>Perhaps if we had <a href=\"http://answers.yahoo.com/question/index?qid=20070511214502AA1c1pz\" target=\"_blank\">four chances instead of three</a> we would have knocked the ball out the park. Fortunately, you can just click the link below to jump to the home plate.</p>",
						 "<p>We're sorry, it's kind of embarrassing. Too bad we couldn't have gotten an &quot;E&quot; instead, which <a href=\"http://askville.amazon.com/grade-Students-graded-left/AnswerViewer.do?requestId=4948324\" target=\"_blank\">in some schools means Excellent</a>! We'll try to make up for it by starting over and sending you to our home page.</p>",
						 "<p>We didn't even leave you with a cul de sac  to turn around. Did you know that <a href=\"http://www.merriam-webster.com/dictionary/cul-de-sac\" target=\"_blank\">cul de sac</a> literally means &quot;bottom of the bag&quot; in French? Now that you know that, we're going to turn you around to our home page.</p>");

//Print out the page header
	$title = "Page not found";
	get_header();
	
//Print out the page body
	echo "<article class=\"content error-page no-splash " . $classes[$rand] . "\">
<h1>" . $title . "</h1>
<h2>" . $subTitle[$rand] . "</h2>
" . $pageContent[$rand] . "
<p class=\"return\"><a href=\"" . get_site_url() . "\">Go Back to Safety</a></p>
</article>";

//Print out the footer
	get_footer();
?>