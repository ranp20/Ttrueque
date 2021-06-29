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
$categories = $cat->get_categorias();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Producto</title>
  <?php require_once 'includes/head.php'; ?>
  <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
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
                    <!-- <div class="cChangetoadd">
                        <div class="cChangetoadd__cont">
                            <input id="productoChange" type="radio" class="cChangetoadd__cont--input">
                            <label for="productoChange" class="cChangetoadd__cont--label">Producto</label>
                        </div>
                        <div class="cChangetoadd__cont">
                            <input id="serviciosChange" type="radio" class="cChangetoadd__cont--input">
                            <label for="serviciosChange" class="cChangetoadd__cont--label">Servicio</label>
                        </div>
                    </div> -->
                <div class="form-content">
                    <input type="hidden" name="tienda" id="tienda" value="<?php echo $d[0]["tienda"]; ?>">
                    <!-- input para traer el id de la tienda -->
                    <!--  NOMBRE DEL PRODUCTO-->
                    <div class="product-controls">
                        <label for="" class="label-product lang_ttrq"><span key="txt-form-add_product-1">Nombre del
                            producto</span><span class="span-required-add-products_ttrq">&nbsp;*</span></label>
                        <input type="text" name="name" class="input-product" id="name">
                    </div>
                    <!--  CATEGORÍA DEL PRODUCTO -->
                    <div class="product-controls">
                        <label for="" class="label-product lang_ttrq"><span key="txt-form-add_product-2">Categoría del
                            producto</span><span class="span-required-add-products_ttrq">&nbsp;*</span></label>
                        <select type="text" class="input-product select-onehidden" id="list_categories"
                            name="categoria">
                            <option value="0">Selecciona una Categoría</option>
                              <?php
                              foreach ($categories as $val) {
                                echo "
                                      <option value='{$val['id_categoria']}'>{$val['nombre_categoria']}</option>
                                  ";
                              }
                              ?>
                        </select>
                    </div>
                    <!--  MARCA DEL PRODUCTO -->
                    <div class="product-controls">
                        <label for="" class="label-product lang_ttrq"><span key="txt-form-add_product-3"></span>Marca</label>
                        <input type="text" name="marca" class="input-product" id="marca">
                    </div>
                    <!--  PAÍS DEL PRODUCTO -->
                    <div class="product-controls">
                        <label for="" class="label-product lang_ttrq"><span key="txt-form-add_product-4"></span>Pais<span class="span-required-add-products_ttrq">&nbsp;*</span></label>
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
                        <label for="" class="label-product lang_ttrq"><span key="txt-form-add_product-5"></span>Stock<span class="span-required-add-products_ttrq">&nbsp;*</span></label>
                        <input type="number" name="stock" id="stock" class="input-product">
                    </div>
                    <!--  PRECIO DEL PRODUCTO -->
                    <div class="product-controls">
                        <label for="" class="label-product lang_ttrq"><span key="txt-form-add_product-6"></span>Precio<span class="span-required-add-products_ttrq">&nbsp;*</span></label>
                        <div class="content-icon-input">
                            <div class="content-icon-input__conticon">
                                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px"><title>Artboard 39</title><path d="M61.94,50.08a19,19,0,0,0-4.88-2.24c-1-.31-2.21-.63-3.52-1-1.11-.31-2.31-.6-4.18-1a38.67,38.67,0,0,1-5.85-1.73,7,7,0,0,1-2.83-2,4.5,4.5,0,0,1-.91-3c0-.1,0-.19,0-.29a4.6,4.6,0,0,1,1-2.59,7.48,7.48,0,0,1,3.31-2.28A17.18,17.18,0,0,1,50.19,33a17.1,17.1,0,0,1,4.58.62,9.42,9.42,0,0,1,3,1.45,6,6,0,0,1,1.54,1.63l1.62,2.52L66,36l-1.62-2.52a11.93,11.93,0,0,0-3.08-3.25,15.36,15.36,0,0,0-4.84-2.36A22,22,0,0,0,53,27.17V20H47v7.16a23.3,23.3,0,0,0-4.88,1.08,13.53,13.53,0,0,0-6,4.12l-.08.1a10.66,10.66,0,0,0-2.29,6.26,10.51,10.51,0,0,0,2.11,7l.1.12a13,13,0,0,0,5.37,3.89,44.62,44.62,0,0,0,6.74,2c1.72.38,2.83.65,3.92,1,1.29.32,2.37.61,3.32.9a13,13,0,0,1,3.33,1.52,5.54,5.54,0,0,1,1.68,1.7A5.67,5.67,0,0,1,61,59.67s0,.09,0,.14a5.6,5.6,0,0,1-1,3.35,7.94,7.94,0,0,1-3.61,2.72A16.19,16.19,0,0,1,49.92,67h-.19a15,15,0,0,1-7-1.47,8.27,8.27,0,0,1-2.92-2.61l-1.71-2.46-4.93,3.42,1.71,2.46A14.38,14.38,0,0,0,40,70.89,21.24,21.24,0,0,0,48,73v7h6V72.71a21.32,21.32,0,0,0,4.59-1.24,13.91,13.91,0,0,0,6.29-4.79,11.57,11.57,0,0,0,2.12-7,10.84,10.84,0,0,0-5.06-9.61Z"/></svg>
                            </div>
                            <input type="number" name="precio" class="input-product" id="precio">
                        </div>
                    </div>
                    <!--  DESCRIPCIÓN(MODIFICADO) DEL PRODUCTO -->
                    <div class="product-controls">
                        <label for="" class="label-product lang_ttrq"><span key="txt-form-add_product-8"></span>Descripción<span class="span-required-add-products_ttrq">&nbsp;*</span></label>
                        <textarea name="desc" id="desc" class="input-product" style="min-height: 120px;max-height: 200px;"></textarea>
                    </div>
                </div>
            </div>
            <!--  IMÁGENES DEL PRODUCTO -->
            <div class="product-content">
                <div class="form-content">
                    <div class="product-controls-imgs">
                        <div class="content-principal-img_product">
                            <label for="" class="label-product-img lang_ttrq"><span key="txt-form-add_product-7">Imágen principal</span><span class="span-required-add-products_ttrq">&nbsp;*</span></label>
                            <div class="add-img-primary">
                                <input type="file" name="imagen[]" class="input-product-img imgs" id="img"
                                    accept="img/*">
                            </div>
                        </div>
                    </div>
                    <div id="moreimgs"></div>
                </div>
            </div>
            <button type="submit" class="btn-add-product add_cli-prods-ttrk lang_ttrq" id="btn-product"
                key="btn-form-add-product">Agregar</button>
        </form>
      </div>
    </div>
    <script src="./js/product.js"></script>
    <script src="./js/categorias.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>