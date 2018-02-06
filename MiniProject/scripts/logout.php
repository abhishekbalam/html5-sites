<?php
	require_once('session.php');
	require_once('class.main.php');
	$user_logout = new MAIN();
	
	if($user_logout->is_loggedin())
	{
		//$user_logout->redirect('../home.php');
		if(isset($_GET['logout']) && $_GET['logout']=="true")
		{
			$user_logout->doLogout();
			$user_logout->redirect('../index.php');
		}
		else{
			echo "Dont fuck with my get params";
			exit;
		}
	}
	else{
		echo "not logged in";
	}
