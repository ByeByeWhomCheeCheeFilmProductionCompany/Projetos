<?php
    $user = $_GET['secao'];
    $slug_geral = $_GET['canal'];

    $linkPeraWebCat = 'http://empresas.peraweb.com.br/'.$user;


    $return = json_decode(file_get_contents('http://empresas.peraweb.com.br/json-to-rss/jsons/secao-'.$user.'.json'));

    //echo $return->user[0]->description;

    $secao = $return;

    foreach ($secao as $k =>$line){

         if($k>=1) break;
        echo '<div class="row col-lg-12  '.$slug_geral.'"><h2 class="page-header secao text-capitalize">'.$user.'</h2></div><div class="row col-lg-12></a>

                                <div class="thumbnail" style="overflow:hidden;padding:0;">

                                    <a href="'.$linkPeraWeb.'"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:135px;background:url('.$line->user->profile_background_image_url.')"></div>

                                    <div class="col-md-1 col-xs-1" style="margin-top: -25px;">

                                        <div class="thumbnail">

                                            <img src="'.$line->user->profile_image_url.'" alt="'.$line->user->name.'">

                                        </div>

                                    </div></a>

                                    <div class="caption">

                                        <a href="'.$linkPeraWebSec.'"><h4>'.$line->user->name.'</h4></a>

                                        <h6><a href="'.$linkPeraWebSec.'" target="_blank">@'.$line->user->screen_name.'</a></h6><br>

                                        <p>'.$line->user->description.'</p>

                                    </div>

                                </div>

                            </div>';

    }

    echo '<div class="row col-lg-12"><div class="row col-lg-12 tab-content"></a>';
    $secao = $return;

    foreach ($secao as $k =>$line){

        if($k>=40) break;

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

        $texto = preg_replace('/(^|\s)#(\w+)/', '\1<a target="_blank" title="PeraWeb | Busca: #\2" href="http://empresas.peraweb.com.br/search.php?cx=partner-pub-8290638757858092%3A9074290390&cof=FORID%3A10&ie=UTF-8&sa=Search&q=\2">#\2</a>', $texto);

        $linkPeraWebSec = 'http://empresas.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name;

        $linkPeraWeb = 'http://empresas.peraweb.com.br/'.$slug_geral.'/'.$line->user->screen_name.'/'.$line->id.'/'.removeAcentos($line->text,'-');

                    echo '<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 cards">

                                <div class="thumbnail" style="overflow:hidden;padding:0;">

                                    <a href="'.$linkPeraWeb.'"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:135px;background:url('.$line->user->profile_background_image_url.')"></div>

                                    <div class="col-md-4 col-xs-4" style="margin-top: -25px;">

                                        <div class="thumbnail">

                                            <img src="'.$line->user->profile_image_url.'" alt="'.$line->user->name.'">

                                        </div>

                                    </div></a>

                                    <div class="caption">

                                        <a href="'.$linkPeraWebSec.'"><h4>'.$line->user->name.'</h4></a>

                                        <h6><a href="'.$linkPeraWebSec.'" target="_blank">@'.$line->user->screen_name.'</a></h6><br>

                                        <p>'.$texto.'</p>';

                                    if(strlen($line->entities->media[0]->media_url) > 0){

                                        echo '<a href="'.$linkPeraWeb.'"><img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" src="'.$line->entities->media[0]->media_url.'" alt="'.removeAcentos($line->text,'-').'"></a>';

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


