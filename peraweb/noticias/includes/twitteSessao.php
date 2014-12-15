<?php
    $user = $_GET['secao'];
    $slug_geral = $_GET['canal'];

    $linkPeraWebCat = 'http://noticias.peraweb.com.br/'.$user;
         $antigo = array("normal.jpeg","normal.png","normal.jpg");
         $novo = array("200x200.jpeg","200x200.png","200x200.jpg");

    $return = json_decode(file_get_contents('http://noticias.peraweb.com.br/json-to-rss/jsons/secao-'.$user.'.json'));

    //echo $return->user[0]->description;

    $secao = $return;

    foreach ($secao as $k =>$line){

         if($k>=1) break;


        echo '<div class="row col-lg-12  '.$slug_geral.'"><h1 class="page-header secao text-capitalize"><a href="http://noticias.peraweb.com.br/'.$slug_geral.'">'.$slug_geral.'</a> / '.$user.'</h1></div><div class="row col-lg-12"></a>

                                <div class="thumbnail" style="overflow:hidden;padding:0;">

                                    <a href="'.$linkPeraWeb.'"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:400px;background:url('.$line->user->profile_banner_url.');background-repeat: no-repeat;"></div>

                                    <div class="col-md-1 col-xs-1" style="margin-top: -25px;">

                                        <div class="thumbnail">

                                            <img src="'.str_replace( $antigo,$novo,$line->user->profile_image_url).'" alt="'.$line->user->name.'">

                                        </div>

                                    </div></a>

                                    <div class="caption">

                                        <a href="'.$linkPeraWebSec.'"><h3>'.$line->user->name.'</h3></a>

                                        <!--<h6><a href="'.$linkPeraWebSec.'" target="_blank">@'.$line->user->screen_name.'</a></h6><br>

                                        <p style="font-size:26px">'.$line->user->description.'</p>-->

                                    </div>

                                </div>

                            </div><br>';

    }
    echo '<div class="row col-lg-12"><h2 class="page-header secao text-capitalize">Feed -  '.$line->user->name.'</h2></div><br><div class="col-lg-12 tab-content"></a>';


    //echo '<div class="row col-lg-12"><div class="row col-lg-12 tab-content"></a>';
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

                                        echo '<a href="'.$linkPeraWeb.'"><img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" src="'.$line->entities->media[0]->media_url.'?imgTitle='.removeAcentos($line->text,'-').'" alt="'.preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->text).'" title="'.preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->text).'" ></a>';

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

    echo '</div>';


