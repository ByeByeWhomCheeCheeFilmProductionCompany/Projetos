<?php

	header("Content-Type: application/json; charset=UTF-8");

	require 'tmhOAuth/tmhOAuth.php';
	require 'twitter_auth.php';
	$tmhOAuth = new tmhOAuth($twitter_auth);
	$screen_name = $_GET['screen_name'];
	$statuses_url = '1.1/lists/list.json';
	$code = $tmhOAuth->request('GET', $tmhOAuth->url($statuses_url), array(
		'owner_screen_name'=>$screen_name,
		'count'=>10,
	));
	$return = $tmhOAuth->response;
	//var_dump ($return);
	echo $return['response'];

$fp_d = fopen('lista.json', 'w');
fwrite($fp_d, $return['response']);
fclose($fp_d);
?>