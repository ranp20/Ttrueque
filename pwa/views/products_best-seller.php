<div class="container margin_60_35" id="content-destacados" style="padding-top: 0;margin-top: 1em;">
	<div class="main_title" id="title-content-destacados">
		<div id="content-text-more-destacados">
			<h3>Más Recientes</h3>
		</div>
	</div>
	<div class="owl-carousel owl-theme products_carousel">
		<?php
			foreach($popular as $key){
				$descuento = "<span class='ribbon new'>Oferta</span>";
				$estrellas = "<p class='m-0'>Sin puntuar</p>";
				$max_estrellas = 5;

				if($key["descuento_producto"] > 0){
				$descuento = "<span class='ribbon off'>-{$key["descuento_producto"]}%</span>";
				}

				if($key["estrellas"] > 0){
					$estrellas = "";
					for($i = 0; $i < $key["estrellas"]; $i++){
						$estrellas .= "<i class='icon-star voted'></i>";
					}	
					if($max_estrellas - $key["estrellas"] != 0){
						for($i = 0; $i < $max_estrellas - $key["estrellas"]; $i++){
							$estrellas .= "<i class='icon-star'></i>";
							}								
						}						
					}

					$ruta_image = $path_p . $key["ruta_imagen"];

					echo "
						<div class='item' style='margin-right:6px;'>
							<div class='grid_item targets_products_recently'>
								$descuento
								<figure class='photo_products'>
									<a href='product-detail-2.php?id={$key["id_producto"]}'>
									<div class='content-img-recently-purschased-h'>
										<img class='owl-lazy image-card-product' src='{$ruta_image}' data-src='{$ruta_image}' alt='' height='200'>
									</div>
									</a>
								</figure>
							<div style='text-align:left;padding:0 1em;'>
								<div class='rating mb-1'>$estrellas</div>
								<a href='product-detail.php?id={$key["id_producto"]}'>
									<h3>{$key["nombre_producto"]}</h3>
								</a>
								<div class='price_box'>
									<span class='new_price' style='font-size:1.6em;'>{$key["precio_producto"]} Bikers</span>
								</div>
							</div>
							<ul>
								<li>
									<a href='#sign-in-dialog' id='sign-in' class='tooltip-1 access_link' data-toggle='tooltip' data-placement='left' title='Añadir a Lista de Deseos'>
									<i class='ti-heart'></i><span>Añadir a Lista de Deseos</span>
									</a>
								</li>

							</ul>
							</div>
						  </div>";
			}
		?>
	</div>
</div>