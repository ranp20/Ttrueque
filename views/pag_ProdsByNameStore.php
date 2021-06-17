<?php

session_start();

require_once '../php/class/client.php';
$client = new client();
$dataCli = $client->get_data_by_id($_SESSION['user']);

require_once '../php/class/product.php';
$product = new Product();

$store = (isset($_REQUEST['store'])&& $_REQUEST['store'] !=NULL) ? $_REQUEST['store'] : '';

if($store == $_POST['store']){

	//VARIABLES DE PAGINACIÓN...
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = 16; //CANTIDAD DE REGISTROS A MOSTRAR POR PÁGINA...
	$adjacents  = 3; //brecha entre páginas después de varios adyacentes
	$offset = ($page - 1) * $per_page;

	$count_query = $product->get_count_ProdsByNameStore($store);

	if ($row = $count_query){
		$numrows = $row[0]['numrows'];
	}
	
	$total_pages = ceil($numrows/$per_page);

	$products = $product->get_limit_ProdsByNameStore($store, $offset, $per_page);

	/*********************** FUNCIÓN - ESTRUCTURA DE PAGINACIÓN *********************/
	function paginate($page, $tpages, $adjacents) {
		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination__menu">';
		
		/*********************** PÁGINA ANTERIOR ************************/
		if($page==1) {
			$out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
		} else if($page==2) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load(1)'>$prevlabel</a></span></li>";
		}else {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load(".($page-1).")'>$prevlabel</a></span></li>";
		}
		
		/*********************** PRIMERA PÁGINA ************************/
		if($page>($adjacents+1)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load(1)'>1</a></li>";
		}

		/*********************** INTERVALOS ************************/
		if($page>($adjacents+2)) {
			$out.= "<li><a>...</a></li>";
		}

		/*********************** PÁGINAS ************************/
		$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
		$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
		for($i=$pmin; $i<=$pmax; $i++) {
			if($i==$page) {
				$out.= "<li class='active'><a>$i</a></li>";
			}else if($i==1) {
				$out.= "<li><a href='javascript:void(0);' onclick='load(1)'>$i</a></li>";
			}else {
				$out.= "<li><a href='javascript:void(0);' onclick='load(".$i.")'>$i</a></li>";
			}
		}

		/*********************** INTERVALOS ************************/
		if($page<($tpages-$adjacents-1)) {
			$out.= "<li><a>...</a></li>";
		}

		/*********************** ÚLTIMA PÁGINA ************************/
		if($page<($tpages-$adjacents)) {
			$out.= "<li><a href='javascript:void(0);' onclick='load($tpages)'>$tpages</a></li>";
		}

		/*********************** SIGUIENTE PÁGINA ************************/
		if($page<$tpages) {
			$out.= "<li><span><a href='javascript:void(0);' onclick='load(".($page+1).")'>$nextlabel</a></span></li>";
		}else {
			$out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
		}
		
		$out.= "</ul>";
		return $out;
	}

	if ($numrows>0){

?>
	<div class="cont-allprods">
		<ul class="cont-allprods__menu">
			<?php 

			$idclientSESSION = $_SESSION['user'];

			foreach($products as $key => $value){

			$path = "./shop/folder/{$value['imagen']}";
			$path_store = "./shop/folder/{$value['logo']}";
			$path_bandera = "./admin/images/banderas/{$value['bandera']}";
			$name = (strlen($value['nombre_producto']) >= 54) ? substr($value['nombre_producto'], 0, 54) . "..." : $value['nombre_producto'];
			$idstorecli = $dataCli[0]['tienda'];
			$idtiendacurrent = $value['id_tienda'];

			$marca = "";
			if($value['marca_producto'] == "" || $value['marca_producto'] == null){
				$marca = "<p class='cont-allprods__menu--link--contdescript--trademark not-specified'>No especificado</p>";
			}else{
				$marca = "<p class='cont-allprods__menu--link--contdescript--trademark'>{$value['marca_producto']}</p>";
			}

			if($idstorecli == $idtiendacurrent){
				echo "
					<li class='cont-allprods__menu--item'>
						<a href='product-detail?id={$value['id_producto']}' class='cont-allprods__menu--link'>
							<div class='cont-allprods__menu--link--contimg'>
								<div class='cont-allprods__menu--link--contimgcountry'>
									<img src='{$path_bandera}' alt='country_flag__ttrueque'>
								</div>
								<img src='{$path}' alt='thumbnail__ttrueque'>
							</div>
							<div class='cont-allprods__menu--link--contdescript'>
								{$marca}
								<h3 class='cont-allprods__menu--link--contdescript--name'>${name}</h3>
								<h2 class='cont-allprods__menu--link--contdescript--price'>
									<span class='convertDollarsPrice'>$ {$value['precio_producto']}</span></br>
									<span class='realBikkersPrice'>[{$value['precio_producto']}] Bikkers</span>
								<h2>
							</div>
						</a>
					</li>
				";
			}else{

				echo "
					<li class='cont-allprods__menu--item'>
						<a href='product-detail?id={$value['id_producto']}' class='cont-allprods__menu--link'>
							<div class='cont-allprods__menu--link--contimg'>
								<div class='cont-allprods__menu--link--contimgcountry'>
									<img src='{$path_bandera}' alt='country_flag__ttrueque'>
								</div>
								<img src='{$path}' alt='thumbnail__ttrueque'>
							</div>
							<div class='cont-allprods__menu--link--contdescript'>
								{$marca}
								<h3 class='cont-allprods__menu--link--contdescript--name'>${name}</h3>
								<h2 class='cont-allprods__menu--link--contdescript--price'>
									<span class='convertDollarsPrice'>$ {$value['precio_producto']}</span></br>
									<span class='realBikkersPrice'>[{$value['precio_producto']}] Bikkers</span>
								<h2>
							</div>
						</a>
						<a href='#' class='cont-allprods__menu--buy btn_addcart_strproducts'
							attr_name='{$value['nombre_producto']}'
              attr_price='{$value['precio_producto']}'
              attr_store_id='{$value['id_tienda']}'
              attr_store_name='{$value['nombre_tienda']}'
              attr_image='${path}'
              attr_store_logo='${path_store}'
              attr_count=1 
              attr_id='{$value['id_producto']}'
              attr_idclient='{$idclientSESSION}'
						>
							<span>AÑADIR AL CARRO</span>
							<!--<span>&nbsp;&nbsp;&#8250;</span>-->
						</a>
					</li>
				";
				}
			}
			?>
		</ul>
	</div>
	<div class="content_pagination">
		<?= paginate($page, $total_pages, $adjacents);?>
	</div>	
		<?php
	} else {
		?>
	<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>Aviso!!!</h4> No hay datos para mostrar
  </div>
		<?php
	}
}
?>