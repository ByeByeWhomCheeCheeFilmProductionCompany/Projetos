<?php

require_once 'tmhOAuth/tmhOAuth.php';
require 'twitter_auth.php';

$tmhOAuth = new tmhOAuth($twitter_auth);
$statuses_url = '1.1/lists/list.json';
$code = $tmhOAuth->request('GET', $tmhOAuth->url($statuses_url), array(
	'owner_screen_name'=>'peranewsint',
	'count'=>1000,
));
$return = $tmhOAuth->response;
echo '<pre>';
var_dump ($return);//var_dump ($code);
//salvaJson('lista',$return['response']);
echo '</pre>';

$fp_d = fopen('jsons/lista.json', 'w');
fwrite($fp_d, $return['response']);
fclose($fp_d);
echo 'Lista principal criada<br><br>';

?>