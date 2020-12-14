<?php
require_once "./php/process_header_home.php";

require_once 'php/class/all.php';
$all = new ALl();
$mante = $all->get_mantenience();
$mantenience =  $mante[0]['state_mantenience'];

//print_r($mante[0]['state_mantenience']);
if($mantenience == 'YES'){
    header('Location: mantenience');
}



$banner_p = $data["banner_principal"];
session_start();
$path_b_p = "admin/images/banner_principal/";

?>
<?php require_once './view_home/header_home.php'; ?>

<body>
    <div id="page" class="page_index-1">
        <?php	
			require_once "./view_home/presentacion_b.php";	
		?>
        <!-- /HEADER -  BANNER DE PRESENTACIÓN -->
        <main id="contenedor-principal-home">
            <div loading="lazy" class="img-fluid" id="img-b-p"
                style="background-image: url(<?php echo $path_b_p . $banner_p[0]["link_banner_p"]; ?>);"></div>
            <!--/CAROUSEL -  BANNER DE PRESENTACIÓN -->
        </main>
        <!-- /MAIN COTENEDOR - BANNER DE PRESENTACIÓN -->
        <div class="cont-totalinfo-in-landingpage-tabs">
            <?php require_once './view_home/presentacion_texto_b.php'; ?>
        </div>
        <!-- /FOOTER -  BANNER DE PRESENTACIÓN -->
    </div>

    <!-- page --->
    <div id="toTop"></div>
    <!-- Back to top button -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/carousel-home.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/actions_pages/modal_dialog.js"></script>
    <script src="js/actions_pages/search_products.js"></script>
    <script src="js/customs/custom.js"></script>
    <!-- SWEEET ALERT 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
    var linksParent = $(".cont-links-pgs-info");
    var links = linksParent.find("a");
    var items = $(".oposition-info");

    links.eq(0).add(items.eq(0)).addClass("active");

    linksParent.on("click", "a", function(event) {

        var target = $(this.getAttribute("href"));

        var t = $(this);
        var ind = t.index();
        t.add(items.eq(ind)).addClass("active").siblings().removeClass("active");
        if (target.length) {
            event.preventDefault();
            $("html, body").stop().animate({
                    scrollTop: target.offset().top,
                },
                1000
            );
        }


        //NUEVAS VARIABLES BREAKPOINTS...
        var smallBp = matchMedia("(max-width: 992px)");
        var changesmall = mql => {
         //mql.matches ? $(this).parent().parent().css({'transform' : 'translateX(-100%)'}) : $(this).parent().parent().css({'transform' : 'translateX(0%)'})
         
         if(mql.matches){
            $(this).parent().parent().toggleClass('open');
            $(this).parent().parent().parent().parent().parent().find('.overlay').toggleClass('open');
         }else{
            $(this).parent().parent().toggleClass('open'); 
            $(this).parent().parent().parent().parent().parent().find('.overlay').toggleClass('open');
         }

        }

        smallBp.addListener(changesmall);
        changesmall(smallBp);

    });
    </script>
</body>

</html>