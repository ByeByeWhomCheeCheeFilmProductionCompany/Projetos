<?php


    $slug_geral = $_GET['canal'];

    $linkPeraWebCat = 'http://empresas.peraweb.com.br/'.$slug_geral;

    echo '<div class="col-lg-12  '.$slug_geral.'"><h2 class="page-header secao text-capitalize">'.$slug_geral.'</h2></div><div class="row "></a>';

    $return = json_decode(file_get_contents('http://empresas.peraweb.com.br/json-to-rss/jsons/canal-'.$slug_geral.'.json'));;

    $secao = ($usage == 'hashtag') ? $return->statuses : $return;

    foreach ($secao->users as $k =>$line){

        if($k>=400) break;

        //echo '<br>'.$line->screen_name;

        $texto = $line->status->text;

        $texto = str_pad($texto, 3, ' ', STR_PAD_LEFT);   //pad feed     

        $startat = stripos($texto, '@'); 

        $numat = substr_count($texto, '@');

        $numhash = substr_count($texto, '#'); 

        $numhttp = substr_count($texto, 'http'); 

        $texto = preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "<a title='PeraWeb | link: \\0'  itemprop='url' target='_blank' rel='nofollow' href=\"\\0\">\\0</a>", $texto);

        $texto = preg_replace("(@([a-zA-Z0-9\_]+))", "<a title='PeraWeb | Twitter: \\0'  href=\"http://twitter.com/\\1\" target='_blank' rel='nofollow' >\\0</a>", $texto);

        $texto = preg_replace('/(^|\s)#(\w+)/', '\1<a target="_blank" title="PeraWeb | Busca: #\2" href="http://empresas.peraweb.com.br/search.php?cx=partner-pub-8290638757858092%3A9074290390&cof=FORID%3A10&ie=UTF-8&sa=Search&q=\2">#\2</a>', $texto);

        $linkPeraWebSec = 'http://empresas.peraweb.com.br/'.$slug_geral.'/'.$line->screen_name;

        $linkPeraWeb = 'http://empresas.peraweb.com.br/'.$slug_geral.'/'.$line->screen_name.'/'.$line->status->id.'/'.removeAcentos($line->status->text,'-');

                    echo '<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 ">

                                <div class="thumbnail" style="overflow:hidden;padding:0;">

                                    <a href="'.$linkPeraWeb.'"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:135px;background:url('.$line->profile_background_image_url.')"></div>

                                    <div class="col-md-4 col-xs-4" style="margin-top: -25px;">

                                        <div class="thumbnail">

                                            <img src="'.$line->profile_image_url.'" alt="'.$line->name.'">

                                        </div>

                                    </div></a>

                                    <div class="caption">

                                        <a href="'.$linkPeraWebSec.'"><h4>'.$line->name.'</h4></a>

                                        <h6><a href="'.$linkPeraWebSec.'" target="_blank">@'.$line->screen_name.'</a></h6>

                                        <p>'.$texto.'</p>';

                                    if(strlen($line->status->entities->media[0]->media_url) > 0){

                                        echo '<a href="'.$linkPeraWeb.'"><img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" src="'.$line->status->entities->media[0]->media_url.'" alt="'.removeAcentos($line->status->text,'-').'"></a>';

                                    }

                                    echo '

                                        <div class="text-center">

                                            <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>

                                            <a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>

                                            <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>

                                        </div>

                                    </div>

                                </div>

                            </div>';

    }

    echo '</div>';


