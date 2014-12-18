<?php

require 'tmhOAuth/tmhOAuth.php';
require 'twitter_auth.php';

$return = json_decode(file_get_contents('http://empresas.peraweb.com.br/json-to-rss/jsonsCron/lista.json'));
$canal = ($usage == 'hashtag') ? $return->statuses : $return;

foreach ($canal as $line){

    $return = json_decode(file_get_contents('http://empresas.peraweb.com.br/json-to-rss/jsonsCron/canal-'.$line ->slug.'.json'));;
    $secao = ($usage == 'hashtag') ? $return->statuses : $return;

    foreach ($secao->users as $line){
    	
		$tmhOAuth = new tmhOAuth($twitter_auth);
		$sec_geral =$line ->screen_name;
		$statuses_url = '1.1/statuses/user_timeline.json';
		$code = $tmhOAuth->request('GET', $tmhOAuth->url($statuses_url), array(
			'screen_name'=>$line ->screen_name,
			'count'=>1000,
		));

		$return = $tmhOAuth->response;
		//salvaJson('sec-'.$sec_geral,$return['response']);
		
		//echo $return['response'];
		if(strlen($line->name) > 0){
			echo 'Criando Sessao: '.htmlspecialchars($line ->name).'<br />';
			$fp_d = fopen('jsonsCron/secao-'.$sec_geral.'.json', 'w');
			fwrite($fp_d, $return['response']);
			fclose($fp_d);
		}else{
			echo 'Sessao '.htmlspecialchars($line ->name).' não Criada<br />';
		}

	}
	echo '<br>';
}
?>