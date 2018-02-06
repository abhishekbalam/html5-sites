<?php
	session_start();
	
	require_once ("class.main.php");
	$obj = new MAIN();
	
	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)
	if(!$obj->is_loggedin())
	{
		// session no set redirects to login page
		// echo "<script>alert('Not Logged In.Redirecting to login page.');document.location.href='index.php';</script>";
		$obj->redirect('index.php');
	}
	