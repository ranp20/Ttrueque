<div class="content-ttrk-official-markets-c" id="cont-all-products_in_stores-categories">
	<div class="contenido-categorias_ttrk-off-header">
		<div class="content-title-categorias_ttrk">
			<h3 class="lang_ttrq" key="title-prods-list-cat_ttrq">Productos</h3>
			<input type="hidden" id="tienda-cli_prod" name='idtienda' value="<?php echo $_GET['store'];?>">
			<input type="hidden" id="categoria-cli_prod" name='idcategoria' value='<?php echo $_GET['cat'];?>'>
			<input type="hidden" id="name-categoria" name='categoria' value="<?php echo $_GET['categoria'];?>">
			<input type="hidden" id="idtienda_current" value="<?php echo $d[0]['tienda']; ?>">
		</div>
	</div>
	<div class="container-content-off-mrkts">
		<?php

		if (isset($_GET['store']) && isset($_GET['cat'])) {
			echo "
					<section class='list-products-stores-ttrk-c'>
							<button type='button' class='btn-l-cart-product-str_ttrq'><i class='fas fa-angle-left'></i></button>
							<button type='button' class='btn-r-cart-product-str_ttrq'><i class='fas fa-angle-right'></i></button>
						<ul class='items-products-stores-ttrk' id='list_products_by_store'>
						</ul>
					</section>
				";
		} else if(isset($_GET["categoria"])) {
			echo "
				<section class='list-all-products-search-categoria'>
					<button type='button' class='btn-l-search-all-categorias-products'><i class='fas fa-angle-left'></i></button>
					<button type='button' class='btn-r-search-all-categorias-products'><i class='fas fa-angle-right'></i></button>
					<ul class='items-products-search-categorias' id='list_all-products-search_category'>
					</ul>
				</section>
			";

		}else{
			echo '<script> location.replace("./"); </script>';
		}
		?>
		<div class="content-btn-more-brands-ttrk">
			<a href="#" class="btn-brands-alls-ttrk">
				<button type="button" class="btn-into-alls-ttrk lang_ttrq" key="btn-all-products_ttrq">Ver todos los productos</button>
			</a>
		</div>
	</div>