<?php

require_once 'tmhOAuth/tmhOAuth.php';
require 'twitter_auth.php';

$return = json_decode(file_get_contents('http://noticias.peraweb.com.br/json-to-rss/jsons/lista.json'));
$canal = ($usage == 'hashtag') ? $return->statuses : $return;

foreach ($canal as $line){
	$tmhOAuth = new tmhOAuth($twitter_auth);
	$slug_geral =$line ->slug;
	$statuses_url = '1.1/lists/members.json';
	$code = $tmhOAuth->request('GET', $tmhOAuth->url($statuses_url), array(
		'slug'=>$line ->slug,
		'owner_screen_name'=>'peranewsbr',
		'count'=>1000,
	));
	$return = $tmhOAuth->response;
	//salvaJson('cat-'.$slug_geral,$return['response']);
	echo 'Criando categoria: '.$line ->name.'<br />';

	//echo 	$return['response'];
	if(strlen($line->name) > 0){
		$fp_d = fopen('jsons/canal-'.$slug_geral.'.json', 'w');
		fwrite($fp_d, $return['response']);
		fclose($fp_d);
	}
}
?>