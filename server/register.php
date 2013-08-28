<?php
//Include the required files
	require_once("../../../../wp-blog-header.php");
	
	if (is_array($_POST) && count($_POST) &&
		isset($_POST['first']) && isset($_POST['last']) && isset($_POST['username']) && isset($_POST['password']) &&
		!empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['username']) && !empty($_POST['password'])) {
			$first = $_POST['first'];
			$last = $_POST['last'];
			$username = strtolower($_POST['username']);
			$password = $_POST['password'];
			
		//Has this user name already been taken?
			if (username_exists($username)) {
				die("This username already exists.");
			}
	
		//Is this email from the gcc.edu email domain?
			$emailSplit = explode("@", $username);
	
			if ($emailSplit[1] != "gcc.edu") {
				die("Sorry, sign-ups are only permitted using the GCC.edu email domain.");
			}
			
		//Complete resitration
			$displayName = $first . " " . $last;
			$registration = array("display_name" => $displayName, "first_name" => $first, "last_name" => $last, "user_email" => $username, "user_login" => $username, "user_pass" => $password);
			wp_insert_user($registration);
			wp_redirect(site_url() . "/wp-login.php?checkemail=registered");
			exit;
	} else {
		die("The information for creating an account is invalid.");
	}
?>