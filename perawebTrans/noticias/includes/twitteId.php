<?php

$idTwitte = $_GET['id'];
$user = $_GET['secao'];
$slug_geral = $_GET['canal'];
         $antigo = array("normal.jpeg","normal.png","normal.jpg");
         $novo = array("200x200.jpeg","200x200.png","200x200.jpg");
                        $tmhOAuth = new tmhOAuth($twitter_auth);

                       

                        // $screen_name = $_GET['screen_name'];

                        $statuses_url = '1.1/statuses/show.json';

                        $code = $tmhOAuth->request('GET', $tmhOAuth->url($statuses_url), array(

                            'id'=>$idTwitte,

                        ));

                        $return = json_decode($tmhOAuth->response['response'], false);

                        $line = ($usage == 'hashtag') ? $return->statuses : $return;

echo '<div class="col-lg-12  '.$slug_geral.'"><h1 class="page-header secao text-capitalize">'.$line->user->name.'</h1></div><br><div class="row ">';

                        // echo $response['response'].'<br>';

                        //  echo '<pre>';

                        //     var_dump($line);

                        //     echo '</pre>';

                            //echo $line;

                           
echo '<!--<pre>';
echo ' '.print_r($return).'';
echo '</pre>-->';
                            $texto = $line->text;

                            $texto = str_pad($texto, 3, ' ', STR_PAD_LEFT);   //pad feed     

                            $startat = stripos($texto, '@'); 

                            $numat = substr_count($texto, '@');

                            $numhash = substr_count($texto, '#'); 

                            $numhttp = substr_count($texto, 'http'); 

                            $texto = preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "<a title='PeraWeb | link: \\0'  itemprop='url' target='_blank' rel='nofollow' href=\"\\0\">\\0</a>", $texto);

                            $texto = preg_replace("(@([a-zA-Z0-9\_]+))", "<a title='PeraWeb | Twitter: \\0'  href=\"http://twitter.com/\\1\" target='_blank' rel='nofollow' >\\0</a>", $texto);

                            $texto = preg_replace('/(^|\s)#(\w+)/', '\1<a target="_blank" title="PeraWeb | Busca: #\2" href="http://noticias.peraweb.com.br/search.php?cx=partner-pub-8290638757858092%3A9074290390&cof=FORID%3A10&ie=UTF-8&sa=Search&q=\2">#\2</a>', $texto);

                            $linkPeraWebSec = 'http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name;

                            $linkPeraWeb = 'http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.removeAcentos(preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->text),'-');


                                        echo '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">

                                                    <div class="thumbnail" style="overflow:hidden;padding:0;">

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:135px;background:url('.$line->user->profile_background_image_url.')"></div>

                                                        <div class="col-md-2 col-xs-2" style="margin-top: -25px;">

                                                            <div class="thumbnail">

                                                                <img src="'.str_replace($antigo,$novo,$line->user->profile_image_url).'" alt="'.$line->user->name.'">

                                                            </div>

                                                        </div>

                                                        <div class="caption">

                                                            <a href="'.$linkPeraWebSec.'"><h2>'.$line->user->name.'</h2></a>

                                                            <h6><a href="'.$linkPeraWebSec.'" target="_blank">@'.$line->user->screen_name.'</a></h6><br>

                                                            <p style="font-size:26px">'.$texto.'</p>';

                                                        if(strlen($line->entities->media[0]->media_url) > 0){

                                                            echo '<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" src="'.$line->entities->media[0]->media_url.'?imgTitle='.removeAcentos($line->text,'-').'" alt="'.preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->text).'" title="'.preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->text).'">';

                                                        }

                                                        echo '

                                                            <div class="text-center">


                                            <a class="btn btn-social-icon btn-facebook btn-lg" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://www.facebook.com/sharer/sharer.php?u=http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.$line->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-facebook"></i></a>

                                            <a class="btn btn-social-icon btn-google-plus btn-lg" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://plus.google.com/share?url=http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.$line->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-google-plus"></i></a>

                                            <a class="btn btn-social-icon btn-twitter btn-lg" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://twitter.com/intent/tweet?text=http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.$line->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-twitter"></i></a>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>';

//publicidade

                                        echo '<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 " style="z-index:999999999!important">

                                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

                                                        <!-- Arroba 2 - peraWeb -->

                                                        <ins class="adsbygoogle"

                                                             style="display:inline-block;width:300px;height:250px"

                                                             data-ad-client="ca-pub-8290638757858092"

                                                             data-ad-slot="1481814796"></ins>

                                                        <script>

                                                        (adsbygoogle = window.adsbygoogle || []).push({});

                                                        </script>

                                                </div>';

echo '<div class="row col-lg-12"><h2 class="page-header secao text-capitalize">Mais de '.$line->user->name.'</h2></div><br><div class="col-lg-12 tab-content"></a>';



    //$linkPeraWebCat = 'http://noticias.peraweb.com.br/'.$user;

    $return = json_decode(file_get_contents('http://noticias.peraweb.com.br/json-to-rss/jsons/secao-'.$user.'.json'));

    //echo $return->user[0]->description;

    $secao = $return;

    // foreach ($secao as $k =>$line){

    //      if($k>=1) break;

    //      echo '<br><br><br>'.$line->user->description.'';

    // }

    $secao = $return;
echo '<!--<pre>';
echo ' '.print_r($return).'';
echo '</pre>-->';
    foreach ($secao as $k =>$line){

        if($k>=51) break;

        //echo '<br>'.$line->user->screen_name;

        //echo '<br>'.$k;

        //echo $line;

        $texto = $line->text;

        $texto = str_pad($texto, 3, ' ', STR_PAD_LEFT);   //pad feed     

        $startat = stripos($texto, '@'); 

        $numat = substr_count($texto, '@');

        $numhash = substr_count($texto, '#'); 

        $numhttp = substr_count($texto, 'http'); 

        $texto = preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "<a title='PeraWeb | link: \\0'  itemprop='url' target='_blank' rel='nofollow' href=\"\\0\">\\0</a>", $texto);

        $texto = preg_replace("(@([a-zA-Z0-9\_]+))", "<a title='PeraWeb | Twitter: \\0'  href=\"http://twitter.com/\\1\" target='_blank' rel='nofollow' >\\0</a>", $texto);

        $texto = preg_replace('/(^|\s)#(\w+)/', '\1<a target="_blank" title="PeraWeb | Busca: #\2" href="http://noticias.peraweb.com.br/search.php?cx=partner-pub-8290638757858092%3A9074290390&cof=FORID%3A10&ie=UTF-8&sa=Search&q=\2">#\2</a>', $texto);

        $linkPeraWebSec = 'http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name;

        $linkPeraWeb = 'http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.removeAcentos(preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->text),'-');

                    echo '<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 cards">

                                <div class="thumbnail" style="overflow:hidden;padding:0;">

                                    <a href="'.$linkPeraWeb.'"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:135px;background:url('.$line->user->profile_background_image_url.')"></div>

                                    <div class="col-md-4 col-xs-4" style="margin-top: -25px;">

                                        <div class="thumbnail">

                                            <img src="'.str_replace( $antigo,$novo,$line->user->profile_image_url).'" alt="'.$line->user->name.'">

                                        </div>

                                    </div></a>

                                    <div class="caption">

                                        <a href="'.$linkPeraWebSec.'"><h4>'.$line->user->name.'</h4></a>

                                        <h6><a href="'.$linkPeraWebSec.'" target="_blank">@'.$line->user->screen_name.'</a></h6><br>

                                        <p>'.$texto.'</p>';

                                    if(strlen($line->entities->media[0]->media_url) > 0){

                                        echo '<a href="'.$linkPeraWeb.'"><img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" src="'.$line->entities->media[0]->media_url.'?imgTitle='.removeAcentos($line->text,'-').'" alt="'.preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->text).'" title="'.preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->text).'"></a>';
                                        echo '<meta property="og:image" content="'.$line->entities->media[0]->media_url.'?imgTitle='.removeAcentos($line->text,'-').'" />';

                                    }

                                    echo '

                                        <div class="text-center">


                                            <a class="btn btn-social-icon btn-facebook" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://www.facebook.com/sharer/sharer.php?u=http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.$line->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-facebook"></i></a>

                                            <a class="btn btn-social-icon btn-google-plus" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://plus.google.com/share?url=http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.$line->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-google-plus"></i></a>

                                            <a class="btn btn-social-icon btn-twitter" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://twitter.com/intent/tweet?text=http://noticias.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.$line->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-twitter"></i></a>


                                        </div>

                                    </div>

                                </div>

                            </div>';

    }





//fim da página

                        echo '<br>

                                                                          </div>';







