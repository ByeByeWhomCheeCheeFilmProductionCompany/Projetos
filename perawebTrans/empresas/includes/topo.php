<!DOCTYPE html>
<html>

<head>
            <?php

                function removeAcentos($string, $slug = false) {

                        $string = strtolower($string);



                        // Código ASCII das vogais

                        $ascii['a'] = range(224, 230);

                        $ascii['e'] = range(232, 235);

                        $ascii['i'] = range(236, 239);

                        $ascii['o'] = array_merge(range(242, 246), array(240, 248));

                        $ascii['u'] = range(249, 252);



                        // Código ASCII dos outros caracteres

                        $ascii['b'] = array(223);

                        $ascii['c'] = array(231);

                        $ascii['d'] = array(208);

                        $ascii['n'] = array(241);

                        $ascii['y'] = array(253, 255);



                        foreach ($ascii as $key=>$item) {

                            $acentos = '';

                            foreach ($item AS $codigo) $acentos .= chr($codigo);

                            $troca[$key] = '/['.$acentos.']/i';

                        }



                        $string = preg_replace(array_values($troca), array_keys($troca), $string);



                        // Slug?

                        if ($slug) {

                            // Troca tudo que não for letra ou número por um caractere ($slug)

                            $string = preg_replace('/[^a-z0-9]/i', $slug, $string);

                            // Tira os caracteres ($slug) repetidos

                            $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);

                            $string = trim($string, $slug);

                        }



                        return $string;

                    }

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (!empty($_GET['titulo'])){

$titulo = $_GET['titulo'];
$tipo = 'article';
$descricao =  $_GET['canal'].' | '.$_GET['secao'].' - '.$_GET['titulo'];

}elseif (!empty($_GET['id'])){

$titulo = $_GET['titulo'];
$tipo = 'article';
$descricao =  $_GET['canal'].' | '.$_GET['secao'].' - '.$_GET['titulo'];


}elseif(!empty($_GET['secao'])){


$titulo = $_GET['canal'].' | '.$_GET['secao'];
$tipo = 'section';
$descricao =  $_GET['canal'].' | '.$_GET['secao'].' - '.$_GET['titulo'];

}elseif (!empty($_GET['canal'])) {

$titulo = $_GET['canal'];
$tipo = 'channel';
$descricao =  $_GET['canal'].' | '.$_GET['secao'].' - '.$_GET['titulo'];
}else{

$titulo = "";


}

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noodp"/>
<meta name="description" content="<?php echo $descricao;  ?>"/>
<link rel="canonical" href="<?php echo $actual_link; ?>" />
<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:url" content="<?php echo $actual_link; ?>" />
<meta property="article:section" content="<?php echo $_GET['canal'].' | '.$_GET['secao']; ?>" />

    <title>PeraWeb Empregos | <?php echo $titulo;?></title>

    <!-- Core CSS - Include with every page -->
    <link href="http://empresas.peraweb.com.br/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://empresas.peraweb.com.br/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="http://empresas.peraweb.com.br/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="http://empresas.peraweb.com.br/css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="http://empresas.peraweb.com.br/css/sb-admin.css" rel="stylesheet">

<link rel="stylesheet" href="http://empresas.peraweb.com.br/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53882064-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://empresas.peraweb.com.br/">PeraWeb | Empresas</a>
            </div>
                <!-- /.navbar-header -->
<form action="http://empresas.peraweb.com.br/search.php" id="cse-search-box">
            <ul class="nav navbar-top-links navbar-right col-xs-8 hidden-xs">
                <li class="sidebar-search">
                            <div class="input-group custom-search-form col-xs-4 navbar-right">

                            <style type="text/css">
                            @import url(http://www.google.com/cse/api/branding.css);
                            #bPersonalizada{
                                position: absolute;
                                top: 30px;
                                width:300px;
                                margin-left: -150px;
                            }
                            #bPersonalizada div{
                                float: left;
                            }
                            </style>
                            <!-- <div class="cse-branding-bottom" style="background-color:#FFFFFF;color:#000000">
                              <div class="cse-branding-form">     -->                            
                                  <!-- <div> -->
                                    <input type="hidden" name="cx" value="partner-pub-8290638757858092:9074290390" />
                                    <input type="hidden" name="cof" value="FORID:10" />
                                    <input type="hidden" name="ie" value="UTF-8" />
                                    <!-- <input type="text" name="q" size="55" /> -->
                                    <!-- <input type="submit" name="sa" value="Search" /> -->
                                   <input type="text"  name="q"  class="form-control input-sm" placeholder="Busque..." />
                                    <span class="input-group-btn">
                                        <button type="submit" name="sa" value="Search" class="btn btn-default btn-sm" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                  <!-- </div> -->

                              <!-- </div> -->
                            <div id="bPersonalizada" >
                                  <div class="cse-branding-logo">
                                    <img src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="Google" />
                                  </div>
                                  <div class="cse-branding-text">
                                    Busca personalizada
                                  </div>
                            </div>



                            </div>
                            <!-- /input-group -->
                </li>
               
            </ul>
            <!-- /.navbar-top-links -->              
</form>