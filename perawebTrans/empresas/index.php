<?php



    //header("Content-Type: application/json; charset=UTF-8");

include 'includes/topo.php';

include 'includes/lateral.php';



?>









        <div id="page-wrapper">

            <div class="row ">

            <?php




require 'json-to-rss/tmhOAuth/tmhOAuth.php';

require 'json-to-rss/twitter_auth.php';

$tmhOAuth = new tmhOAuth($twitter_auth);





if (!empty($_GET['id'])){

include 'includes/twitteId.php';

}elseif(!empty($_GET['secao'])){

include 'includes/twitteSessao.php';

}elseif (!empty($_GET['canal'])) {

include 'includes/twitteCanal.php';

}else{

include 'includes/home.php';


} ?>



        </div>

        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->



    <!-- Core Scripts - Include with every page -->

    <script src="http://empresas.peraweb.com.br/js/jquery-1.10.2.js"></script>

    <script src="http://empresas.peraweb.com.br/js/bootstrap.min.js"></script>

    <script src="http://empresas.peraweb.com.br/js/plugins/metisMenu/jquery.metisMenu.js"></script>



    <!-- Page-Level Plugin Scripts - Dashboard -->

    <script src="http://empresas.peraweb.com.br/js/plugins/morris/raphael-2.1.0.min.js"></script>

    <script src="http://empresas.peraweb.com.br/js/plugins/morris/morris.js"></script>

    <script src="http://empresas.peraweb.com.br/js/plugins/masonry.pkgd.min.js"></script>



    <!-- SB Admin Scripts - Include with every page -->

    <script src="http://empresas.peraweb.com.br/js/sb-admin.js"></script>



    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->

    <script src="http://empresas.peraweb.com.br/js/demo/dashboard-demo.js"></script>

<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>

</body>



</html>

