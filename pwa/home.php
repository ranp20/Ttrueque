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

	$path = "../admin/images/banner/";
	$path_bp = "../admin/images/banner_publicidad/";
	$path_cli = "../shop/folder/";
	$path_store = "../shop/images/store/";
	$path_flag = "../admin/images/banderas/";

	if(!isset($_SESSION['user'])){
		header("location: index.php");
	}

	$nameuser = $_SESSION['user'][0]['nombre_cliente'];
	$idpaisuser = $_SESSION['user'][0]['id_pais'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'includes/header-index.php'; ?>
	<title>Home - App WebView</title>
</head>
<body>
  <?php require_once 'includes/headertop-pwa.php'; ?>
	<?php require_once '../views/api_whatsapp.php'; ?>
   <div class="container-home" id="container-homeWebView">
    <?php
			require_once 'php/process_headerWebView.php';

			$p = new Product();
			$top_sells = $p->top_sell($idpaisuser);
		?>
      <div id="datos_search"></div>
      <main id="contenedor-principal-home_WebView" style="margin-top: 57px !important;">
        <div id="carousel-home" style="height: auto;">
          <div class="owl-carousel owl-theme cont-links-products-banners">
            <!--/owl-slide-->
            <div class="owl-slide cover" style="background-image: url(<?php echo $path . $banners[0]["link_banner"]; ?>);">
              <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                <div class="container contain-total-slider-banners">
                  <div class="row justify-content-center justify-content-md-start">
                    <div class="col-lg-6 static">
                      <div class="slide-text white content-info-banner-top">
                        <h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[0]["titulo_banner"]; ?></h2>
                        <p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[0]["descripcion_banner"]; ?></p>
                        <div class="owl-slide-animated owl-slide-cta">
                          <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
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
                        <h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[1]["titulo_banner"]; ?></h2>
                        <p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[1]["descripcion_banner"]; ?></p>
                        <div class="owl-slide-animated owl-slide-cta">
                          <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
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
                        <h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[2]["titulo_banner"]; ?></h2>
                        <p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[2]["descripcion_banner"]; ?></p>
                        <div class="owl-slide-animated owl-slide-cta">
                          <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
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
                        <h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[3]["titulo_banner"]; ?></h2>
                        <p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[3]["descripcion_banner"]; ?></p>
                        <div class="owl-slide-animated owl-slide-cta">
                          <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
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
                        <h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[4]["titulo_banner"]; ?></h2>
                        <p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[4]["descripcion_banner"]; ?></p>
                        <div class="owl-slide-animated owl-slide-cta">
                          <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
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
                        <h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[5]["titulo_banner"]; ?></h2>
                        <p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[5]["descripcion_banner"]; ?></p>
                        <div class="owl-slide-animated owl-slide-cta">
                          <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="icon_drag_mobile"></div>
        </div>
    	</div>
	    <div class="p-3">
        <?php require_once 'includes/best-seller.php'; ?>
        <?php require_once 'includes/official-markets.php'; ?>
	    </div>
    </main>
  </div>
  <?php require_once 'includes/tabsbottom-pwa.php'; ?>
  <script src="../js/common_scripts.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/carousel-home.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript">
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
      'use strict';
      $.cookieBar({
          fixed: true
      });
  });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="../js/actions_pages/buy_cart.js"></script>
  <script src="../js/actions_pages/remove.js"></script>
  <script src="../js/actions_pages/customs.js"></script>
  <script src="../js/actions_pages/search_products.js"></script>
  <script src="../../js/actions_pages/language_currency.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/actions_pages/track-order.js"></script>
  <script src="../js/customs/custom.js"></script>
</body>
</html>