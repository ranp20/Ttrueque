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
		if(isset($_GET["categoria"])) {
			echo "
				<section class='list-all-products-search-categoria'>
					<button type='button' class='btn-l-search-all-categorias-products'><i class='fas fa-angle-left'></i></button>
					<button type='button' class='btn-r-search-all-categorias-products'><i class='fas fa-angle-right'></i></button>
					<ul class='items-products-search-categorias' id='list_all-products-search_category'>
					</ul>
				</section>
			";
		}else if(isset($_GET["store"])) {
			
			$storename = $_GET["store"];

			require_once '../php/class/store.php';
			$dStore = new Store();
			$listinfoByName = $dStore->list_storeinfo_byName($storename);
			$pathstrphoto = "";
			$path_valid = $_SERVER['DOCUMENT_ROOT']."/Ttrueque/shop/images/store/".$listinfoByName[0]['logo'];
			if(!file_exists($path_valid)){
				$pathstrphoto = "./shop/images/store/default-store.png";
			}else{
				$pathstrphoto = "./shop/images/store/".$listinfoByName[0]['logo'];
			}
			echo "
				<div class='contain__cont'>
					<div class='contain__cont--info'>
						<div class='contain__cont--info--btnsiconsadap'>
							<a href='#ciconfilterprods' class='contain__cont--info--btnsiconsadap--icon'>
								<img src='./img/iconos_index/svg_icon_filter.svg' alt=''>
								<span>Filtrar</span>
							</a>
							<a href='#ciconinfostoreprods' class='contain__cont--info--btnsiconsadap--icon'>
								<img src='./img/iconos_index/svg_icon_info.svg' alt=''>
								<span>Info. Store</span>
							</a>
						</div>
						<div class='c-sidebarLeft__filtericons' id='ciconfilterprods'>
							<div class='contain__cont--info--filter'>
								<p class='contain__cont--info--filter--titleord'>Ordernar por:</p>
								<select class='contain__cont--info--filter--selfilter' name='' id='list_filter_products'>
									<option value='1'>Más vendidos</option>
									<option value='2'>Precio de menor a mayor</option>
									<option value='3'>Precio de mayor a menor</option>
									<option value='4'>Marca</option>
								</select>
							</div>
						</div>
						<div class='c-sidebarLeft__filtericons' id='ciconinfostoreprods'>
							<div class='contain__cont--info--strinfo'>
								<h3 class='contain__cont--info--strinfo--title'>Información de la tienda</h3>
								<div class='contain__cont--info--strinfo--cPhoto'>
									<img class='contain__cont--info--strinfo--cPhoto--img' src='{$pathstrphoto}' alt=''>
									<span class='contain__cont--info--strinfo--cPhoto--namestr'>{$storename}</span>
								</div>
								<div class='contain__cont--info--strinfo--section'>
									<img class='contain__cont--info--strinfo--section--icon' src='./img/iconos_index/jpg_icon_home.jpg' alt=''>
									<span class='contain__cont--info--strinfo--section--desc'>{$listinfoByName[0]['direccion_cliente']}</span>
								</div>
								<div class='contain__cont--info--strinfo--section'>
									<img class='contain__cont--info--strinfo--section--icon' src='./img/iconos_index/jpg_icon_call.jpg' alt=''>
									<span class='contain__cont--info--strinfo--section--desc'>{$listinfoByName[0]['telefono']}</span>
								</div>
								<div class='contain__cont--info--strinfo--section'>
									<img class='contain__cont--info--strinfo--section--icon' src='./img/iconos_index/jpg_icon_phone.jpg' alt=''>
									<span class='contain__cont--info--strinfo--section--desc'>{$listinfoByName[0]['telefono']}</span>
								</div>
								<div class='contain__cont--info--strinfo--section'>
									<img class='contain__cont--info--strinfo--section--icon' src='./img/iconos_index/jpg_icon_email.jpg' alt=''>
									<span class='contain__cont--info--strinfo--section--desc'>{$listinfoByName[0]['email_cliente']}</span>								
								</div>
							</div>
						</div>
					</div>
					<div class='contain__cont--products'>
						<div id='loader' class='contain__cont--products--loader'> 
							<img src='./img/Utilities/loader.gif'>
						</div>
						<div class='filter_result'></div>
					</div>
				</div>
			";

		}else{
			echo '<script> location.replace("./"); </script>';
		}
		?>
		<!--<div class="content-btn-more-brands-ttrk">
			<a href="javascript:void(0);" class="btn-brands-alls-ttrk">
				<button type="button" class="btn-into-alls-ttrk lang_ttrq" key="btn-all-products_ttrq">Ver todos los productos</button>
			</a>
		</div>-->
	</div>
</div>