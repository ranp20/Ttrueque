<?php
session_start();
require_once "../php/process_index.php";
require_once '../php/class/product.php';
require_once '../php/class/store.php';

$c = new Store();
$dat = $c->select_tienda();

$banners = $data["banners"];
$popular = $data["populars"];
$banner_pub = $data["banner_publicidad"];

$path = "admin/images/banner/";
$path_bp = "admin/images/banner_publicidad/";
$path_cli = "shop/folder/";
$path_store = "shop/images/store/";
$path_flag = "admin/images/banderas/";
//PRODUCTOS DEL ADMIN...
if (!isset($_SESSION['user'])) {
	header("Location:login");
}

?>

<?php require_once './header_index.php'; ?>

<body class="body-homepwa" style="padding-bottom: 3rem;position: relative;">
    <div class="contModalGuidettrk"></div>
    <div class="loader-cli">
        <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
      </div>
    <section id="toppwa-ttrq" class="toppwa-ttrq">
        <div class="toppwa-ttrq__content container-maxwidth" style="display: block;">
            <div class="toppwa-ttrq__content--img" style="padding:0px;">
                <img src="img/logotipo-T-white.svg" alt="logotipo-Ttrueque-white.svg"
                    class="toppwa-ttrq__content--img--logo">
            </div>
            <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
        </div>
    </section>
    <div id="page">
        <?php
		require_once '../php/process_header.php';
		// require_once "./headertop-pwa.php";        
		$p = new Product();
		$top_sells = $p->top_sell($d[0]['pais']);

		?>

        <!-- /header -->
        <div id="datos_search"></div>
        <main id="contenedor-principal-home_WebView" style="margin-top: 57px;">
            <div id="carousel-home" style="height: auto;">
                <div class="owl-carousel owl-theme cont-links-products-banners">
                    <!--/owl-slide-->
                    <div class="owl-slide cover" style="background-image: url(<?php echo $path . $banners[0]["link_banner"]; ?>);">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                            <div class="container contain-total-slider-banners">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-6 static">
                                        <div class="slide-text white content-info-banner-top">
                                            <h2 class="owl-slide-animated owl-slide-title">
                                                <?php echo $banners[0]["titulo_banner"]; ?></h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                <?php echo $banners[0]["descripcion_banner"]; ?></p>
                                            <div class="owl-slide-animated owl-slide-cta">
                                                <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                                    href="#content-index-ttrq" role="button">Comprar ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                    <div class="owl-slide cover" style="background-image: url(<?php echo $path . $banners[1]["link_banner"]; ?>);">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                            <div class="container contain-total-slider-banners">
                                <div class="row justify-content-center justify-content-md-end">
                                    <div class="col-lg-6 static">
                                        <div class="slide-text text-right white content-info-banner-top">
                                            <h2 class="owl-slide-animated owl-slide-title">
                                                <?php echo $banners[1]["titulo_banner"]; ?></h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                <?php echo $banners[1]["descripcion_banner"]; ?></p>
                                            <div class="owl-slide-animated owl-slide-cta">
                                                <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                                    href="#content-index-ttrq" role="button">Comprar ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                    <div class="owl-slide cover" style="background-image: url(<?php echo $path . $banners[2]["link_banner"]; ?>);">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                            <div class="container contain-total-slider-banners">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-12 static">
                                        <div class="slide-text text-center white content-info-banner-top">
                                            <h2 class="owl-slide-animated owl-slide-title">
                                                <?php echo $banners[2]["titulo_banner"]; ?></h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                <?php echo $banners[2]["descripcion_banner"]; ?></p>
                                            <div class="owl-slide-animated owl-slide-cta">
                                                <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                                    href="#content-index-ttrq" role="button">Comprar ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                    <div class="owl-slide cover" style="background-image: url(<?php echo $path . $banners[3]["link_banner"]; ?>);">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                            <div class="container contain-total-slider-banners">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-12 static">
                                        <div class="slide-text text-center white content-info-banner-top">
                                            <h2 class="owl-slide-animated owl-slide-title">
                                                <?php echo $banners[3]["titulo_banner"]; ?></h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                <?php echo $banners[3]["descripcion_banner"]; ?></p>
                                            <div class="owl-slide-animated owl-slide-cta">
                                                <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                                    href="#content-index-ttrq" role="button">Comprar ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                    <div class="owl-slide cover" style="background-image: url(<?php echo $path . $banners[4]["link_banner"]; ?>);">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                            <div class="container contain-total-slider-banners">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-6 static">
                                        <div class="slide-text white content-info-banner-top">
                                            <h2 class="owl-slide-animated owl-slide-title">
                                                <?php echo $banners[4]["titulo_banner"]; ?></h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                <?php echo $banners[4]["descripcion_banner"]; ?></p>
                                            <div class="owl-slide-animated owl-slide-cta">
                                                <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                                    href="#content-index-ttrq" role="button">Comprar ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                    <div class="owl-slide cover" style="background-image: url(<?php echo $path . $banners[5]["link_banner"]; ?>);">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                            <div class="container contain-total-slider-banners">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-12 static">
                                        <div class="slide-text text-center white content-info-banner-top">
                                            <h2 class="owl-slide-animated owl-slide-title">
                                                <?php echo $banners[5]["titulo_banner"]; ?></h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                <?php echo $banners[5]["descripcion_banner"]; ?></p>
                                            <div class="owl-slide-animated owl-slide-cta">
                                                <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                                    href="#content-index-ttrq" role="button">Comprar ahora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                </div>
                <div id="icon_drag_mobile"></div>
            </div>
    </div>
    <div class="p-3">

        <?php require_once './best_seller.php'; ?>
        <?php require_once './official_markets.php'; ?>
    </div>
    </main>
    <?php require_once './tabsbottom-pwa.php'; ?>
    </div>
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/carousel-home.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">

    /************************** SYSTEM TABS INTO BANNERS **************************/
    var linksParent = $(".cont-links-products-banners");
    var links = linksParent.find("a");
    var items = $(".content-more-sells");

    linksParent.on("click", "a", function(event) {
        var target = $(this.getAttribute("href"));

        var t = $(this);
        var ind = t.index();
        if (target.length) {
            event.preventDefault();
            $("html, body").stop().animate({
                    scrollTop: target.offset().top,
                },
                1000
            );
        }
    });

    $(document).ready(function() {
      $('#owl-carousel-official').owlCarousel({
        navigation : false,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        dots: false,
        nav: false,
        lazyLoad: true,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout: 3500,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            480:{
                items:2,
                nav:false
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
          }
      });

  });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/actions_pages/buy_cart.js"></script>
    <script src="js/actions_pages/remove.js"></script>
    <script src="js/actions_pages/customs.js"></script>
    <script src="js/actions_pages/search_products.js"></script>
    <script src="js/actions_pages/language_currency.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./js/actions_pages/track-order.js"></script>
    <script src="js/customs/custom.js"></script>
    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
</body>
</html>