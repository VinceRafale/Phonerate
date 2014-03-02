<?php

$app_id		= "1374799492774805";
$app_secret	= "5cf252ba391b732144487b4251f1fe1e";
$site_url	= "http://phonerate.dk/betatest";

include_once "src/facebook.php";
 
$facebook = new Facebook(array(
	'appId'		=> $app_id,
	'secret'	=> $app_secret,
	));
 
$user = $facebook->getUser();

if($user){
//==================== Single query method ======================================
	try{
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');
	}catch(FacebookApiException $e){
		error_log($e);
		$user = NULL;
	}
//==================== Single query method ends =================================
}


$loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'name, id', // Permissions to request from the user
		'redirect_uri'	=> 'Your Site URL', // URL to redirect the user to once the login/authorization process is complete.
		));


$logoutUrl = $facebook->getLogoutUrl(array(
		'next'	=> 'Your Redirect URL after logout', // URL to which to redirect the user after logging out
		));
		
		try{
	$user_info	= $facebook->api('/' . $user);
	$photos		= $facebook->api('/' . $user . '/picture?type=large');
}catch(FacebookApiException $e){
	error_log($e);
}

// Update user's status using graph api
	if(isset($_POST['status'])){
		try{
			$statusUpdate = $facebook->api("/$user/feed", 'post', array('message'=> $_POST['status']));
		}catch(FacebookApiException $e){
			error_log($e);
		}
	}

?>