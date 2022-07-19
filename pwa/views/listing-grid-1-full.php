<?php
session_start();
require_once 'php/process_list_grid.php';
require_once 'php/process_list_products.php';
?>
<?php require_once 'header_index.php'; ?>

<body>
    <div id="page">
        <!-----/header-------->
        <?php require_once 'includes/inc_header-top.php'; ?>
        <div class="top_banner">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="javascript:void(0);"><?php echo $data_page_list["nombre_categoria"] ?></a></li>
                            <li><?php echo $data_page_list["nombre_subcategoria"] ?></li>
                        </ul>
                    </div>
                    <h1><?php echo $data_page_list["nombre_subcategoria"]; ?></h1>
                </div>
            </div>
            <img src="<?php echo $path . $data_page_list["imagen_categoria"] ?>" class="img-fluid lazy" alt="">
        </div>

        <div class="container-sidebar-left-products">
            <div class="contenido-sidebar-producto">
                <div class="contenido-body-sidebar-producto">
                    <!--============== /contenido izquierdo =============-->
                    <div class="contenido-left-sidebar-product">
                        <p class="nombre-categoria-sidebar-left"><?php echo $data_page_list["nombre_categoria"] ?></p>
                        <div id="content-cant-resultado">
                            <div id="title-resultado">
                                <p><?php echo $data_page_list["nombre_subcategoria"]; ?></p>
                            </div>
                            <div id="cant-resultado">
                                <p>1.024 resultados</p>
                            </div>
                        </div>
                        <div id="order-publicaciones">
                            <div id="title-ordenar-sidebar-left">
                                <h6>Ordenar publicaciones</h6>
                            </div>
                            <div id="content-ordenar-sidebar-left">
                                <div id="select-ordenar">
                                    <select name="" id="">
                                        <?php for ($i = 0; $i <= 4; $i++)
											echo "<option>Más relevantes</option>"; ?>
                                    </select>
                                </div>
                                |&nbsp;&nbsp;
                                <div id="tipo-orden">
                                    <i>ico</i>
                                    <i>ico</i>
                                </div>
                            </div>
                        </div>
                        <div id="oficial-tiendas">
                            <div id="title-tiendas-sidebar-left">
                                <h6>Tiendas Oficiales</h6>
                            </div>
                            <div id="list-tiendas-sidebar-left">
                                <ul>
                                    <a href="javascript:void(0);">
                                        <li>Solo tiendas oficiales (58)</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div id="categories-sidebar-left">
                            <div id="title-categories-sidebar-left">
                                <h6>Categorías</h6>
                            </div>
                            <div id="body-sidebar-left">
                                <ul>
                                    <?php
									for ($i = 0; $i <= 10; $i++) {
										echo "<a href='javascript:void(0);'><li>Laptos y Accesorios</li></a>";
									}
									// if(!isset($all_categorias[$categoria_actual])){
									// 	$all_categorias[$categoria_actual] = [];
									// 	array_push($all_categorias[$categoria_actual],$val["nombre_subcategoria"]);
									// }
									?>
                                </ul>
                            </div>
                        </div>
                        <div id="condicion-sidebar-left">
                            <div id="tile-condicion">
                                <h6>Condición</h6>
                            </div>
                            <div id="list-condicion">
                                <ul>
                                    <a href="javascript:void(0);">
                                        <li>Nuevo (1.006)</li>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <li>Usado (168)</li>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <li>Reacondicionado (2)</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div id="ubicacion-sidebar-left">
                            <div id="title-ubicacion">
                                <h6>Ubicación</h6>
                            </div>
                            <div id="list-ubicaciones">
                                <ul>
                                    <?php for ($i = 0; $i <= 8; $i++)
										echo  '<a href="javascript:void(0);">
									 	<li>Lima(1.028)</li> 
									  </a>'
									?>
                                </ul>
                            </div>
                        </div>
                        <div id="precio-sidebar-left">
                            <div id="title-precio">
                                <h6>Precio</h6>
                            </div>
                            <div id="list-precio">
                                <ul>
                                    <a href="javascript:void(0);">
                                        <li>Hasta S/500 (381)</li>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <li>S/500 a S/2.000 (388)</li>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <li>Más de S/2.000 (429)</li>
                                    </a>
                                </ul>
                            </div>
                            <div id="buscar-precio-sidebar-left">
                                <input type="text" placeholder="Mínimo">
                                &nbsp;-&nbsp;
                                <input type="text" placeholder="Máximo">
                            </div>
                        </div>
                        <div id="descuentos-sidebar-left">
                            <div id="title-descuentos">
                                <h6>Descuentos</h6>
                            </div>
                            <div id="list-descuentos">
                                <ul>
                                    <a href="javascript:void(0);">
                                        <li>Desde 10% off (35)</li>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <li>Desde 20% off (32)</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div id="detalles-sidebar-left">
                            <div id="title-detalles">
                                <h6>Detalles de la publicación</h6>
                            </div>
                            <div id="list-detalles">
                                <ul>
                                    <a href="javascript:void(0);">
                                        <li>Mejores Vendedores (309)</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--============== /contenido derecho =============-->
                    <div class="contenido-right-sidebar-product">
                        <ul>
                            <?php
							// foreach ($data_products as $val) {

							// 	$p = $path_products . $val["ruta_imagen"];

							// 	echo "<a href='javascript:void(0);'>
							// 			<li>
							// 				<div class='content-imagen-sidebar-left'>
							// 					<img class='img-fluid lazy' src='{$p}' data-src='{$p}' alt=''>
							// 				</div>
							// 				<div class='content-descripcion-sidebar-left'>
							// 					<p>{$val["precio_producto"]} <i class='fal fa-coins'></i></p>
							// 					<p>Envío grátis</p>
							// 					<p>{$val["nombre_producto"]}</p>
							// 					<p>Por Drimer</p>						
							// 				</div>
							// 			</li>
							// 		</a>";
							// }
							?>
                        </ul>
                        <div class="pagination__wrapper">
                            <ul class="pagination">
                                <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
                                <li>
                                    <a href="#0" class="active">1</a>
                                </li>
                                <li>
                                    <a href="#0">2</a>
                                </li>
                                <li>
                                    <a href="#0">3</a>
                                </li>
                                <li>
                                    <a href="#0">4</a>
                                </li>
                                <li><a href="#0" class="next" title="next page">&#10095;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--============== /footer.php ========-->
        <?php require_once 'footer.php'; ?>
    </div>
    <!-- page -->
    <div id="toTop"></div>
    <!-- Back to top button -->
    <!-- COMMON SCRIPTS -->
    <script type="text/javascript" src="js/common_scripts.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!-- SPECIFIC SCRIPTS -->
    <script type="text/javascript" src="js/sticky_sidebar.min.js"></script>
    <!-- <script type="text/javascript" src="js/specific_listing.js"></script> -->
</body>

</html>