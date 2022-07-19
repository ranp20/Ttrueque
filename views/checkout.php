<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();

if (!isset($_SESSION['user'])) {
	header('location: home');
}

if (isset($_POST["check-arr"])) {
	$_SESSION["checkout_store"] = json_decode($_POST["check-arr"]);
} else {
	if (empty($_SESSION["checkout_store"])) {
		echo '<script> location.replace("./"); </script>';
	} else {
		echo '<p style="display:none" >' . json_encode($_SESSION["checkout_store"]) . '</p>';
	}
}
require_once '../php/class/client.php';
$c = new Client();
$cli_id = $c->get_data_by_id($_SESSION['user']);
$d_by_id =  $c->select_points_default($_SESSION['user']);
$country_byid = $c->get_countries_by_idcountry($cli_id[0]['pais']); 
?>
<?php require_once 'header_index.php'; ?>

<body>
    <div id="successpayment"></div>
    <div id="page">
        <?php
		require_once '../php/process_header.php';
		require_once 'includes/inc_header-top.php';
		?>
        <!-- /header -->
        <main class="main_checkout-container bg_gray">
            <h1>Checkout</h1>
            <div class="content-total_checkout_ttrk">
                <!------------------------------>
                <div class="content-left-check-page">
                    <div class="content-info-client">
                        <div class="content-form-info-client">
                            <input type="hidden" class="puntos" name="puntos"
                                value="<?php echo $d_by_id[0]['puntos'];  ?>" />
                            <form method="POST" id="form-client">
                                <div class="cont-info-form-controls">
                                    <h3>Datos Personales</h3>
                                    <input type="text" placeholder="Nombres" id="nombre" name="nombre">
                                    <input type="text" placeholder="Apellidos" id="apellido" name="apellido">
                                </div>
                                <div class="cont-info-form-controls">
                                    <h3>Datos de Envío</h3>
                                    <select name="country" id="pais">
                                        <option value="<?php echo $cli_id[0]['pais']; ?>" selected>
                                            <?php echo $cli_id[0]['nombre_pais']; ?></option>
                                        <?php 										
											foreach ($country_byid as $value) {
												echo "<option value='{$value["id_pais"]}'>{$value["nombre_pais"]}</option>";
											}

										 ?>
                                    </select>
                                    <textarea type="text" placeholder="Dirección de Envío" id="direccion" name="direccion"></textarea>
                                    <input type="text" placeholder="Celular/Teléfono" id="celular" name="celular">
                                </div>
                                <input type="hidden" class="cliente" name="cliente" value="<?php echo  $_SESSION['user'] ?>" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-right-check-page">
                    <div class="content-detail-payment">
                        <h1>Detalle de Compra</h1>
                        <form method="POST" class="form">
                            <div class="cont-info-store">
                                <h1><span>Tienda:</span><span id="name-store">EL QUE VENDE</span></h1>
                            </div>
                            <div class="cont-list-price-prods">
                                <h1>Productos:</h1>
                                <ul class="list_checkout_products">
                                </ul>
                                <div class="cont-total-to-payment">
                                    <h1>
                                        <span>TOTAL</span>
                                        <div class="cont-total">
                                            <span id="total">1200</span>
                                            <span>Bikers</span>
                                        </div>
                                    </h1>
                                </div>
                                <button class="btn-checkout">Confirmar y Pagar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!------------------------------>
            </div>
        </main>
        <!--/main-->
        <?php require_once 'footer.php'; ?>
        <!--/footer-->
    </div>
    <!-- page -->
    <div id="toTop"></div>
    <!-- Back to top button -->
    <!-- COMMON SCRIPTS -->
    
    
    <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" src="./js/actions_pages/checkout-product.js"></script>
    <!--------- SWEEET ALERT 2  ---------->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="./js/actions_pages/language_currency.js"></script>
    <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
    <script type="text/javascript" src="./js/actions_pages/view_cart.js"></script>
    <script type="text/javascript" src="./js/actions_pages/remove.js"></script>
    <script type="text/javascript" src="js/actions_pages/customs.js"></script>
    <script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
    <script type="text/javascript" src="js/actions_pages/listCategories_ByStore.js"></script>
    
    <script type="text/javascript" src="./js/actions_pages/track-order.js"></script>
</body>

</html>