<!--<input type="hidden" id="store_cli" value="<?php //echo $_GET['store']; ?>">-->

<?php 
/*
if(isset($_GET['store'])){
echo '
	<div class="content-ttrk-official-markets-c">
		<div class="contenido-categorias_ttrk-off-header">
			<div class="content-title-categorias_ttrk">
				<h3>Categorías en '.$_GET['store'].'</h3>
			</div>
		</div>
		<div class="container-content-off-mrkts">
		<section class="list-categories-stores-ttrk-c">
			<ul class="items-categ-stores-ttrk" id="list_cat_cli_store">
			</ul>
		</section>
		<div class="content-btn-more-brands-ttrk">
			<a href="Categorias" class="btn-brands-alls-ttrk">
				<button type="button" class="btn-into-alls-ttrk lang_ttrq" key="btn-all-categories-stores_ttrq">Ver todas las Categorías</button>
			</a>
		</div>
	</div>';
}else{
	echo '
		<div class="content-ttrk-official-markets-c">
		<div class="contenido-categorias_ttrk-off-header">
			<div class="content-title-categorias_ttrk">
				<h3 class="lang_ttrq" key="title-cat-list-s_ttrq">Categorías</h3>
			</div>
		</div>
		<div class="container-content-off-mrkts">
		<section class="list-categories-stores-ttrk-c">
			<ul class="items-categ-stores-ttrk" id="lista_categories">';
			
			foreach ($all_categs as $value) {
				$url = './admin/images/categoria/'.$value['imagen_categoria'];
				$name_category = $value['nombre_categoria'];
				$url_name = str_replace(" ", "-", $name_category);


				echo 
				'<li class="item-categ-stores-into">
		      <a href="./tienda?tipos='.$url_name.'" class="item-cont-categ-stores"> 
		        <div class="cont-logo-categories-str-b-ttrk">
		          <div class="logo-categ-str-c-ttrk" style="background-image: url('.$url.');"></div>
		        </div>
		        <div class="cont-info-categ-stores-b-ttrk">
		          <div>
		            <p>'.$name_category.'</p>
		          </div>
		        </div>
		      </a>
	    	</li>';
			}

			echo '</ul>
			</section>
		</div>
		';
}*/
?>