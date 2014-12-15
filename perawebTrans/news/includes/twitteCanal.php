<?php


    $slug_geral = $_GET['canal'];

    $linkPeraWebCat = 'http://news.peraweb.com.br/'.$slug_geral;

    echo '<div class="col-lg-12  '.$slug_geral.'"><h1 class="page-header secao text-capitalize">'.$slug_geral.'</h1></div><div class="col-lg-12 tab-content "></a>';

    $return = json_decode(file_get_contents('http://news.peraweb.com.br/json-to-rss/jsons/canal-'.$slug_geral.'.json'));;

    $secao = ($usage == 'hashtag') ? $return->statuses : $return;
echo '<!--<pre>';
echo ' '.print_r($return).'';
echo '</pre>-->';
    foreach ($secao->users as $k =>$line){

        if($k>=51) break;

        //echo '<br>'.$line->screen_name;

         $antigo = array("normal.jpeg","normal.png","normal.jpg");
         $novo = array("200x200.jpeg","200x200.png","200x200.jpg");
        $texto = $line->status->text;

        $texto = str_pad($texto, 3, ' ', STR_PAD_LEFT);   //pad feed     

        $startat = stripos($texto, '@'); 

        $numat = substr_count($texto, '@');

        $numhash = substr_count($texto, '#'); 

        $numhttp = substr_count($texto, 'http'); 

        $texto = preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "<a title='PeraWeb | link: \\0'  itemprop='url' target='_blank' rel='nofollow' href=\"\\0\">\\0</a>", $texto);

        $texto = preg_replace("(@([a-zA-Z0-9\_]+))", "<a title='PeraWeb | Twitter: \\0'  href=\"http://twitter.com/\\1\" target='_blank' rel='nofollow' >\\0</a>", $texto);

        $texto = preg_replace('/(^|\s)#(\w+)/', '\1<a target="_blank" title="PeraWeb | Busca: #\2" href="http://news.peraweb.com.br/search.php?cx=partner-pub-8290638757858092%3A9074290390&cof=FORID%3A10&ie=UTF-8&sa=Search&q=\2">#\2</a>', $texto);

        $linkPeraWebSec = 'http://news.peraweb.com.br/'.$slug_geral.'/'.$line->screen_name;

        $linkPeraWeb = 'http://news.peraweb.com.br/'.$slug_geral.'/'.$line->screen_name.'/'.$line->status->id.'/'.removeAcentos(preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->status->text),'-');

                    echo '<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 cards">

                                <div class="thumbnail" style="overflow:hidden;padding:0;">

                                    <a href="'.$linkPeraWeb.'"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:135px;background:url('.$line->profile_background_image_url.')"></div>

                                    <div class="col-md-4 col-xs-4" style="margin-top: -25px;">

                                        <div class="thumbnail">

                                            <img src="'.str_replace( $antigo,$novo,$line->profile_image_url).'" alt="'.$line->name.'">

                                        </div>

                                    </div></a>

                                    <div class="caption">

                                        <a href="'.$linkPeraWebSec.'"><h4>'.$line->name.'</h4></a>

                                        <h6><a href="'.$linkPeraWebSec.'" target="_blank">@'.$line->screen_name.'</a></h6>

                                        <p>'.$texto.'</p>';

                                    if(strlen($line->status->entities->media[0]->media_url) > 0){

                                        echo '<a href="'.$linkPeraWeb.'"><img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" src="'.$line->status->entities->media[0]->media_url.'?imgTitle='.removeAcentos($line->status->text,'-').'" alt="'.preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->status->text).'" title="'.preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "",$line->status->text).'"></a>';

                                    }

                                    echo '

                                        <div class="text-center">


                                            <a class="btn btn-social-icon btn-facebook" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://www.facebook.com/sharer/sharer.php?u=http://news.peraweb.com.br/'.$slug_geral.'/'.$line->screen_name.'/'.$line->status->id.'/'.$line->status->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-facebook"></i></a>

                                            <a class="btn btn-social-icon btn-google-plus" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://plus.google.com/share?url=http://news.peraweb.com.br/'.$slug_geral.'/'.$line->screen_name.'/'.$line->status->id.'/'.$line->status->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-google-plus"></i></a>

                                            <a class="btn btn-social-icon btn-twitter" rel="prettyPhoto[iframes]" title="Google.com opened at 100%" href="https://twitter.com/intent/tweet?text=http://news.peraweb.com.br/'.$slug_geral.'/'.$line->screen_name.'/'.$line->status->id.'/'.$line->status->text.'&iframe=true&width=500&height=250" target="_blank"><i class="fa fa-twitter"></i></a>


                                        </div>

                                    </div>

                                </div>

                            </div>';

    }

    echo '</div>';


