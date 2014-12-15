<?php
	header("Content-Type: application/json; charset=UTF-8");
	require 'tmhOAuth/tmhOAuth.php';
	require 'twitter_auth.php';
	$tmhOAuth = new tmhOAuth($twitter_auth);
	$list_name= $_GET['list_name'];
	$screen_name = $_GET['screen_name'];
	$statuses_url = '1.1/lists/members.json';
	$code = $tmhOAuth->request('GET', $tmhOAuth->url($statuses_url), array(
		'owner_screen_name'=>$screen_name,
		'slug'=>$list_name,
		'count'=>100,
	));
	$return = $tmhOAuth->response;
	echo $return['response'];
?>