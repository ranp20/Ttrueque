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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
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
        <?php require_once 'includes/sidebar-left.php'; ?>
        <div class="content-dash">
            <?php require_once 'includes/header-top.php'; ?>
            <div class="content-top">
                <div class="content-title">
                    <h1 class="title-dashboard lang_ttrq" key="title-top-add-products-cli-ad_cli">Agrega tu producto
                    </h1>
                </div>
            </div>
            <div class="content-add-product">
                <form action="" class="form-product" method="POST" autocomplete="false" id="form-product"
                    enctype="multipart/form-data">
                    <!--------- DATOS GENERALES DEL PRODUCTO --------->
                    <div class="product-content">
                        <div class="product-head lang_ttrq" key="subtitle-top-add-products-cli-ad_cli">Información
                            básica</div>
                        <div class="form-content">
                            <input type="hidden" name="tienda" id="tienda" value="<?php echo $d[0]["tienda"]; ?>">
                            <!-- input para traer el id de la tienda -->
                            <!--  NOMBRE DEL PRODUCTO-->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq" key="txt-form-add_product-1">Nombre del
                                    producto</label>
                                <input type="text" name="name" class="input-product" id="name">
                            </div>
                            <!--  CATEGORÍA DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq" key="txt-form-add_product-2">Categoría del
                                    producto</label>
                                <select type="text" class="input-product select-onehidden" id="list_categories"
                                    name="categoria" value="Selecciona la Categoría">
                                </select>
                            </div>
                            <!--  MARCA DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq"
                                    key="txt-form-add_product-3">Marcas</label>
                                <select type="text" name="marca" class="input-product select-onehidden" id="marca"
                                    value="Selecciona una marca">
                                </select>
                            </div>
                            <!--  PAÍS DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq" key="txt-form-add_product-4">Pais</label>
                                <select name="pais" class="input-product select-onehidden" id="pais">
                                    <option value="0" selected>Selecciona el País</option>
                                    <?php
                                    foreach ($pais as $value) {
                                        echo "<option value='{$value["id_pais"]}'>{$value["nombre_pais"]}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--  STOCK DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq" key="txt-form-add_product-5">Stock</label>
                                <input type="number" name="stock" id="stock" class="input-product">
                            </div>
                            <!--  PRECIO DEL PRODUCTO -->
                            <div class="product-controls">
                                <label for="" class="label-product lang_ttrq"
                                    key="txt-form-add_product-6">Bikers</label>
                                <input type="text" name="precio" class="input-product" id="precio">
                            </div>
                        </div>
                    </div>
                    <!--  IMÁGENES DEL PRODUCTO -->
                    <div class="product-content">
                        <div class="form-content">
                            <div class="product-controls-imgs">
                                <div class="content-principal-img_product">
                                    <label for="" class="label-product-img lang_ttrq"
                                        key="txt-form-add_product-7">Imágen principal</label>
                                    <div class="add-img-primary">
                                        <input type="file" name="imagen[]" class="input-product-img imgs" id="img"
                                            accept="img/*">
                                    </div>
                                </div>
                                <!--<div class="content-secondary-imgs_product">
                                    <label for="" class="label-product-imgs lang_ttrq"
                                        key="txt-form-add_product-7-1">Imágenes secundarias</label>
                                    <div class="add-imgs-secondary">
                                        <select name="" id="imgs-select" class="select-onehidden">
                                            <option value="0">Seleccione una opción</option>
                                            <option value="1">Imágenes Secundarias</option>
                                        </select>
                                    </div>
                                </div>-->
                            </div>
                            <div id="moreimgs"></div>
                        </div>
                    </div>
                    <!--------- DESCRIPCIÓN DEL PRODUCTO --------->
                    <div class="product-content">
                        <div class="form-content">
                            <div class="product-controls-desc">
                                <label for="" class="label-product-desc lang_ttrq"
                                    key="txt-form-add_product-8">Descripción</label>
                                <p>NOTA: *Edite los valores de descripción según el producto/servicio a ofrecer*.</p>
                                <textarea id="ckeditor" name="desc" class="ckeditor" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-add-product add_cli-prods-ttrk lang_ttrq" id="btn-product"
                        key="btn-form-add-product">Agregar</button>
                </form>
            </div>
        </div>
        <?php require_once 'tabsbottom-pwa.php'; ?>
        <script src="./js/product.js"></script>
        <script src="./js/marca.js"></script>
        <script src="./js/categorias.js"></script>
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