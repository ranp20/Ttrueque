<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
    header('location: ../cliente/menbresia');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once 'includes/manager-header-index.php'; ?>
    <title>Productos</title>
    <link rel="stylesheet" href="../shop/css/style.css">
    <script src="../shop/ckeditor/ckeditor.js"></script>
</head>
<body class="body-managerpwa mrgtop-57" style="padding-bottom: 3rem;">
    <?php require_once 'includes/headertop-pwa.php'; ?>
    <div class="loader-cli">
        <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
    </div>
    <div class="container-total active">
        <?php require_once 'includes/manager-sidebar-left.php'; ?>
        <section class="content-dash">
            <?php require_once 'includes/manager-header-top.php'; ?>
            <div class="content-top">
                <div class="content-title">
                    <h1 class="title-dashboard lang_ttrq" key="title-top-products-cli-ad_cli">Productos</h1>
                </div>
            </div>
            <div class="btns-top">
                <ul class="btns-options-wallet">
                    <a href="#" class="wallet-detail">
                        <li>
                            <div class="content-icons">
                                <i class="lni lni-dropbox icon-hov"></i>
                            </div>
                            <div>
                                <h4 id="totalList">
                                </h4>
                            </div>
                            <p class="lang_ttrq" key="txt-down-btn-products-top-ad_cli-1">Productos</p>
                        </li>
                    </a>
                    <a href="manager-add-products.php" class="add-to-wallet">
                        <li>
                            <div class="content-icons">
                                <i class="lni lni-plus icon-hov"></i>
                            </div>
                            <span class="lang_ttrq" key="txt-down-btn-products-top-ad_cli-2">Agregar nuevo
                                producto</span>
                        </li>
                    </a>
                </ul>
                <input type="hidden" name="tienda" id="tienda" value="<?php echo $d[0]["tienda"]; ?>">
                <input type="hidden" name="email" id="email" value="<?php echo $d[0]["email_cliente"]; ?>">
            </div>
            <div class="content-list-products-ad_cli-ttrk" id="content-list-products-ad_cli-ttrk">
                <table class="list-products">
                    <thead class="thead-products">
                        <tr>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-1">#</th>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-2">Categoría</th>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-3">Marca</th>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-4">Nombre producto</th>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-5">Descripción</th>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-6">Precio</th>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-7">Stock</th>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-8">Imagen</th>
                            <th class="lang_ttrq" key="title-th-products-ad_cli-9" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-products" id="list">
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <?php require_once 'includes/tabsbottom-pwa.php'; ?>
    <script type="text/javascript">
        ((d) => {
          
          d.querySelector('#btn-tdc-toggle').addEventListener('click', function (){
            let sidebarmanager = d.querySelector('.sidebar-nav');
            let closebtnsidebarleft = d.querySelector('.c-left-btn-tdc');
            if(!sidebarmanager.classList.contains('active')){
              sidebarmanager.style.paddingTop = "3.5rem";
              sidebarmanager.style.paddingBottom = "5rem";
              closebtnsidebarleft.style.top = "60px";
            }else{
              closebtnsidebarleft.style.top = "5px";
            }
          })
        })(document);
    </script>
    <script src="js/actions-pages/manager-products.js"></script>
    <script src="../shop/js/customs.js"></script>
    <script src="../shop/js/dashboard.js"></script>
</body>
</html>