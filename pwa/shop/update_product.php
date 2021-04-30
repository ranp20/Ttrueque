<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
 header('location: ../cliente/menbresia');
}

require_once '../php/class/all.php';
$cat = new All();
$pais = $cat->get_name_country();




if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] == ""){
    header('Location: ./');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Producto</title>
    <?php require_once 'includes/head.php'; ?>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body class="body-homepwa mrgtop-57" style="padding-bottom: 3rem;">
    <?php require_once '../php/process_header.php'; ?>
    <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
    <?php require_once "headertop-pwa.php"; ?>
    <div class="loader-cli">
        <img src="images/gifs/shopping-loader.gif" alt="Loading...">
    </div>
    <div class="container-total active">
        <?php
        require_once 'includes/sidebar-left.php';
        $tienda = $d[0]["tienda"];
        ?>
        <div class="content-dash">
            <?php require_once 'includes/header-top.php'; ?>
            <div class="content-top">
                <div class="content-title">
                    <h1 class="title-dashboard lang_ttrq" key="title-top-update-products-cli-ad_cli">Actualiza tu
                        producto</h1>
                </div>
            </div>
            <div class="content-add-product">
                <form action="" class="form-product" method="POST" autocomplete="false" id="form-product"
                    enctype="multipart/form-data">
                    <!--------- DATOS GENERALES DEL PRODUCTO --------->
                    <div class="product-content">
                        <div class="product-head lang_ttrq" key="subtitle-top-update-products-cli-ad_cli">Información
                            básica</div>
                        <div class="form-content">
                            <input type="hidden" name="prod" id="prod" value="<?php echo $_GET['id']; ?>">
                            <!-- input para traer el id de la tienda -->
                            <!--  NOMBRE DEL PRODUCTO-->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq" key="txt-form-update_product-1">Nombre del
                                    producto</label>
                                <input type="text" name="name" class="input-product" id="name">
                            </div>
                            <!--  CATEGORÍA DEL PRODUCTO -->
                            <div class="product-controls">

                                <label for="" class="label-product lang_ttrq" key="txt-form-update_product-2">Categoría
                                    del producto</label>
                                <select class="input-product" name="categoria" id="list_categories">
                                    <?php

                                    $cate = $cat->get_categorias_tienda($tienda);
                                    foreach ($cate as $value) {
                                        echo "<option value='{$value["id"]}'>{$value["nombre_categoria"]}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--  MARCA DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq"
                                    key="txt-form-update_product-3">Marcas</label>
                                <select name="marca" class="input-product" id="marca">
                                    <?php

                                    $cate = $cat->get_marcas_tienda($tienda);
                                    foreach ($cate as $value) {
                                        echo "<option value='{$value["id"]}'>{$value["nombre_marca"]}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!--  PAÍS DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq"
                                    key="txt-form-update_product-4">Pais</label>
                                <select name="pais" class="input-product select-onehidden" id="pais"
                                    value="Selecciona el País">
                                    <option value="<?php echo $d[0]['id_pais']; ?>"><?php echo $d[0]['nombre_pais']; ?>
                                    </option>
                                    <?php

                                    foreach ($pais as $value) {
                                        echo "<option value='{$value["id_pais"]}'>{$value["nombre_pais"]}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--  STOCK DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq"
                                    key="txt-form-update_product-5">Stock</label>
                                <input type="number" name="stock" id="stock" class="input-product">
                            </div>
                            <!--  PRECIO DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq"
                                    key="txt-form-update_product-6">Precio</label>
                                <input type="text" name="precio" class="input-product" id="precio">
                            </div>
                        </div>
                    </div>
                    <!--  IMÁGENES DEL PRODUCTO -->
                    <div class="product-content">
                        <div class="form-content">
                            <div class="product-controls-imgs">
                                <div class="content-principal-img_product">
                                    <label for="" class="label-product-imgs lang_ttrq"
                                        key="txt-form-update_product-7">Imágenes principales</label>
                                    <div class="add-imgs-primary">
                                        <input type="file" name="imagen" class="input-product-imgs imgs" id="img">
                                        <input type="hidden" name="imagen" class="input-product-imgs" id="imgitp">
                                    </div>
                                </div>
                                <!--<div class="content-secondary-imgs_product"> 
                                    <label for="" class="label-product-imgs lang_ttrq" key="txt-form-add_product-7-1">Imágenes secundarias</label>
                                    <div class="add-imgs-secondary">
                                        <select name="" id="imgs-select" class="select-onehidden">
                                          <option value="0">Seleccione una opción</option>
                                          <option value="1">Imágenes Secundarias</option>
                                        </select>
                                    </div>
                                </div>-->
                            </div>
                            <div id="imgSrc"> </div>
                            <div id="moreimgs"></div>
                        </div>
                    </div>
                    <!--------- DESCRIPCIÓN DEL PRODUCTO --------->
                    <div class="product-content">
                        <div class="form-content">
                            <div class="product-controls-desc">
                                <label for="" class="label-product-desc lang_ttrq"
                                    key="txt-form-update_product-8">Descripción</label>
                                <textarea id="ckeditor" name="desc" class="ckeditor" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-add-product lang_ttrq" id="btn-product-update"
                        key="btn-form-update-product">Actualizar</button>
                </form>
            </div>
        </div>
        <?php require_once 'tabsbottom-pwa.php'; ?>
        <!--<script src="./js/marca.js"></script>-->
        <script src="./js/update_product.js"></script>
        <script src="js/dashboard.js"></script>
        <script src="js/buy-cart.js"></script>
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
</body>
</html>