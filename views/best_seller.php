<div class="content-more-sells margintb-3" id="content-index-ttrq">
	<div class="main_title" id="title-content-more-sells">
		<div id="content-text-more-sells">
			<h3 class="lang_ttrq" key="title_best-seller">Lo más Vendido</h3>
			
		</div>
	</div>
	<?php 

		//print_r($top_sells);
		if($top_sells == []){
			echo "<div class='cont-msg-any-products_sells'>
				<i class='fal fa-frown-open'></i>
				<p>Ups! No hay productos disponibles.</p>
			</div>";
		}else{

	 ?>	
	<div class="owl-carousel owl-theme" id="products-more-sells">
		<!--CONTENT PHP-->
		<?php

		$temp_carousel = "";


		foreach ($top_sells as $key) {
			$descuento = "";
			$aviso = "";
			$estrellas = "<p class='m-0'>Sin puntuar</p>";
			$max_estrellas = 5;

			if ($key["descuento_producto"] > 0) {
				$descuento = "<span class='ribbon off'>-{$key["descuento_producto"]}%</span>";
				$aviso = "<div data-countdown='{$key["descuento_fecha_fin"]}' class='countdown'></div>";
			}

			if ($key["estrellas"] > 0) {
				$estrellas = "";
				for ($i = 0; $i < $key["estrellas"]; $i++) {
					$estrellas .= "<i class='icon-star voted'></i>";
				}
				if ($max_estrellas - $key["estrellas"] != 0) {
					for ($i = 0; $i < $max_estrellas - $key["estrellas"]; $i++) {
						$estrellas .= "<i class='icon-star'></i>";
					}
				}
			}

			//COVERSIÓN IMÁGENES DE PRODUCTOS...
			$photo_img = $key["imagen"];
			$string = $photo_img;
      		$string = mb_convert_encoding($string, "UTF-8");
			//COVERSIÓN IMÁGENES DE BANDERAS...
			$flag_img = $key["bandera"];
			$string_flags = $flag_img;
			$string_flags = mb_convert_encoding($string_flags, "UTF-8");

			$ruta_image = $path_cli . $string;
			$ruta_store_logo = $path_store . $key["logo"];
			$ruta_flag = $path_flag . $string_flags;
			$tienda = str_replace(" ", "-", $key["nombre_tienda"]);
			$prod = str_replace(" ", "-", $key["nombre_producto"]);
			$idcliente = $_SESSION['user'];


			$name_products = substr($key["nombre_producto"], 0, 60);
			$idtienda_productos = $key["id_tienda"];
			$idtienda_current = $d[0]['tienda'];

			if($idtienda_productos == $idtienda_current){
				$temp_carousel .= "
							<div class='item'>				
								<div class='grid_item targets_products'>
									<figure class='photo_products'>
										$descuento
										<a href='./product-detail?id={$key["id_producto"]}'>
										<div class='content-img-best-sells-h'>
											<img   class='owl-lazy image-card-product img-fluid' src='{$ruta_image}' data-src='{$ruta_image}' alt='' height='200'>	
											</div>
										</a>
										<div class='flag-by-country'> 
											<div class='cont-flag-into-image-prod'>
												<div style='background-image:url({$ruta_flag});'></div>
											</div>
										</div>
										$aviso
									</figure>
									<div class='descriptions_products'>
										<div>
											<div class='watermark'>
												<h1>Tu producto</h1>
											</div>
											<!--<div class='rating mb-1 stars_by_products'>
												$estrellas
											</div>-->
											<a class='desc-product-text' href='product-detail.php?id={$key["id_producto"]}'>
												<h1>$name_products</h1>
											</a>
											<div class='price_box'>
												<span class='new_price'>{$key["precio_producto"]} Bikers</span>
											</div>
										</div>
									</div>
								</div>
							</div>";
			}else{
				$temp_carousel .= "<div class='item'>
								<div class='grid_item targets_products'>
									<figure class='photo_products'>
										$descuento
										<a href='./product-detail?id={$key["id_producto"]}'>
										<div class='content-img-best-sells-h'>
											<img   class='owl-lazy image-card-product img-fluid' src='{$ruta_image}' data-src='{$ruta_image}' alt='' height='200'>	
											</div>
										</a>
										<div class='flag-by-country'> 
											<div class='cont-flag-into-image-prod'>
												<div style='background-image:url({$ruta_flag});'></div>
											</div>
										</div>
										$aviso
									</figure>
									<div class='descriptions_products'>
										<div>
											<!--<div class='rating mb-1 stars_by_products'>
												$estrellas
											</div>-->
											<a class='desc-product-text' href='product-detail.php?id={$key["id_producto"]}'>
												<h1>$name_products</h1>
											</a>
											<div class='price_box'>
												<span class='new_price'>{$key["precio_producto"]} Bikers</span>
											</div>
										</div>
									</div>
									<ul class='tooltips_products-for-select-ttrq'>
										<!--<li>
											<a href='#sign-in-dialog' id='sign-in' class='tooltip-1 access_link button-favorites' data-toggle='tooltip' data-placement='left' title='Añadir a Lista de Deseos'>
												<i class='ti-heart'></i>
												<span>Añadir a Lista de Deseos</span>
											</a>
										</li>-->
										<li>
										
											<a href='javascript:void(0);' class='tooltip-1 button_add_cart_shop' data-toggle='tooltip' data-placement='left' title='Añadir al Carrito'
												attr_name={$prod} 				
												attr_price={$key["precio_producto"]} 
												attr_store_id={$key["id_tienda"]} 
												attr_store_name={$tienda} 
												attr_image={$ruta_image} 
												attr_store_logo={$ruta_store_logo} 
												attr_count=1 
												attr_id={$key["id_producto"]}
												attr_idclient={$idcliente}
											
											>
												<i class='ti-shopping-cart'></i>
												<span>Añadir al Carrito</span>
											</a>
										</li>
									</ul>
								</div>
							</div>";	
			}
		}

		echo $temp_carousel;
		?>
	</div>
	<?php 		} ?>
</div>