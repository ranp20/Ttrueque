<?php
require_once "../php/process_detail_producto.php";
require_once "../php/class/product.php";

if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] == ""){
	header("Location: ./");
}

$p = new Product();
$data = $p->get_data($_GET["id"]);
?>
<?php require_once 'header_index.php'; ?>

<body class="body-homepwa">
    <div class="loader-cli">
        <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
    </div>
    <div id="page">
    <?php 
        require_once '../php/process_header.php';
        require_once "./headertop-pwa.php";   
	?>
    <input type="hidden" id="tiendaid_cli" value="<?php echo $d[0]['tienda']; ?>">
    <input type="hidden" id="idproductdet" name="idproductdet" value="<?php echo $_GET['id']; ?>">
    <div class="container-detalle-producto" id="detailprod_ttrq"></div>
    <?php require_once './tabsbottom-pwa.php'; ?>
    </div>
    
    
    <script src="./js/main.js"></script>
    <script src="./js/carousel_with_thumbs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="./js/customs/custom.js"></script>
    <script src="./js/actions_pages/buy_cart.js"></script>
    <script src="./js/actions_pages/customs.js"></script>
    <script src="./js/actions_pages/search_products.js"></script>
    <script src="./js/actions_pages/listProductsDetail.js"></script>
    <script src="./js/actions_pages/track-order.js"></script>
</body>
</html>