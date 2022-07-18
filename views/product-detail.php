<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once "../php/process_detail_producto.php";
require_once "../php/class/product.php";
if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] == ""){
	header("Location: ./");
}
$p = new Product();
$data = $p->get_data($_GET["id"]);
if($data == "" || count($data) <= 0){
  header("Location: ./"); 
}
?>
<?php require_once 'header_index.php'; ?>

<body>
  <?php require_once './api_whatsapp.php'; ?>
  <div id="page">
  <?php 
  require_once '../php/process_header.php';
	require_once './header_b.php';
	?>
    <div class="loader-ttrqstr">
      <span class="loader-ttrqstr--loader"></span>
    </div>
    <input type="hidden" id="tiendaid_cli" value="<?php echo $d[0]['tienda']; ?>">
    <input type="hidden" id="idproductdet" name="idproductdet" value="<?php echo $_GET['id']; ?>">
    <div class="container-detalle-producto" id="detailprod_ttrq"></div>
    <?php require_once 'footer.php'; ?>
  </div>
  <div id="toTopgobtn"></div>
  <script src="./js/common_scripts.min.js"></script>
  <script src="./js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="./js/customs/custom.js"></script>
  <script src="./js/actions_pages/buy_cart.js"></script>
  <script src="./js/actions_pages/customs.js"></script>
  <script src="./js/actions_pages/search_products.js"></script>
  <script src="./js/actions_pages/listProductsDetail.js"></script>
</body>
</html>