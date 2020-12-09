<div class="content-ttrk-official-markets-c">
	<div class="contenido-tiendas-off-header">
		<div class="content-title-tiendas">
			<h3 class="lang_ttrq" key="title_official_markets">Tiendas Oficiales</h3>
		</div>
	</div>
	<div class="container-content-off-mrkts">
		<section class="list-stores-officials-ttrk-c">
			<ul class="items-str-off-ttrk">
				<!-- //ITEMS - TIENDAS OFICIALES EN TTRUEQUE-->
				<?php
				foreach ($dat as $val) {
					if($val['logo'] == "default-store.png"){
						echo "
						<li class='item-str-off-into'>
							<a href='categorias?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
								<div class='cont-logo-offi-mrkt-b-ttrk' style='background: rgba(255,255,255,.3);'>
									<div  loading='lazy' class='logo-off-mrkt-c-ttrk img-fluid' style='background-image: url(../Ttrueque/shop/images/store/{$val['logo']});'></div>
								</div>
								<div class='cont-info-offi-mrkt-b-ttrk'>
									<p>" . ucwords($val['nombre_tienda']) . "</p>
									<!--<p>Supermercados</p>-->
									<!--<p class='tooltip-off-mrkt'>
										<i class='fal fa-calendar-alt'></i>Hoy, 9pm
									</p>-->
								</div>
							</a>
						</li>
						";
					}else{
						echo "
						<li class='item-str-off-into'>
							<a href='categorias?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
								<div class='cont-logo-offi-mrkt-b-ttrk'>
									<div loading='lazy' class='logo-off-mrkt-c-ttrk img-fluid' style='background-image: url(../Ttrueque/shop/images/store/{$val['logo']});'></div>
								</div>
								<div class='cont-info-offi-mrkt-b-ttrk'>
									<p>" . ucwords($val['nombre_tienda']) . "</p>
									<!--<p>Supermercados</p>-->
									<!--<p class='tooltip-off-mrkt'>
										<i class='fal fa-calendar-alt'></i>Hoy, 9pm
									</p>-->
								</div>
							</a>
						</li>
						";
					}
				}
				?>
				<!-- //END TO ITEMS-->
			</ul>
		</section>
		<div class="content-btn-more-brands-ttrk">
			<a href="#" class="btn-brands-alls-ttrk">
				<button type="button" class="btn-into-alls-ttrk lang_ttrq" key="btn-all-stores_ttrq">Ver todas las tiendas</button>
			</a>
		</div>
	</div>