<div class="content-ttrk-official-markets-c margintb-3" id="cont-all-stores-in-ttrk">
    <div class="contenido-tiendas-off-header">
        <div class="content-title-tiendas">
            <h3 class="lang_ttrq" key="title_official_markets">Tiendas Oficiales</h3>
        </div>
    </div>
    <div class="container-content-off-mrkts" id="cont-filter-off-markets">
        <section class="list-stores-officials-ttrk-c" id="cont-list-filter-off-markets">
            <ul class="items-str-off-ttrk owl-carousel owl-theme" id="owl-carousel-official">
				<!-- //ITEMS - TIENDAS OFICIALES EN TTRUEQUE-->
				<?php

				$slice_tiendas = array_slice($dat, 0, 10);
			
				foreach ($slice_tiendas as $val) {
					
					if($val['logo'] == "default-store.png"){
						echo "
						<li class='item-str-off-into item' style='height:150px;border: 1px solid var(--secondary-clr);height:auto;border-radius:32px;padding: 15px;display: flex;flex-direction: column;justify-content: center;text-align: center;'>
							<a href='categorias?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' style='height:auto;'>
								<div class='cont-logo-offi-mrkt-b-ttrk pwa-offmarkets-logos' style='background: rgba(255,255,255,.3);height:150px;margin-bottom: 18px;'>
									<div  loading='lazy' class='logo-off-mrkt-c-ttrk img-fluid' style='background-image: url(../shop/images/store/{$val['logo']});background-size:contain;background-repeat: no-repeat;background-position:center;width: 100%;height:100%;'></div>
								</div>
								<div class='cont-info-offi-mrkt-b-ttrk'>
									<p style='font-size: 1.25rem;color: #332927;'>" . ucwords($val['nombre_tienda']) . "</p>
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
						<li class='item-str-off-into item' style='height:150px;border: 1px solid var(--secondary-clr);height:auto;border-radius:32px;padding: 15px;display: flex;flex-direction: column;justify-content: center;text-align: center;'>
							<a href='categorias?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' style='height:auto;'>
								<div class='cont-logo-offi-mrkt-b-ttrk pwa-offmarkets-logos' style='height:150px;margin-bottom: 18px;'>
									<div loading='lazy' class='logo-off-mrkt-c-ttrk img-fluid' style='background-image: url(../shop/images/store/{$val['logo']});background-size:contain;background-repeat: no-repeat;background-position:center;width: 100%;height:100%;'></div>
								</div>
								<div class='cont-info-offi-mrkt-b-ttrk'>
									<p style='font-size: 1.25rem;color: #332927;'>" . ucwords($val['nombre_tienda']) . "</p>
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
        <div class="content-btn-more-brands-ttrk" id="btn-filter-stores-index">
            <a href="allstores" class="btn-brands-alls-ttrk">
                <button type="button" class="btn-into-alls-ttrk lang_ttrq" key="btn-all-stores_ttrq">Ver todas las
                    tiendas</button>
            </a>
        </div>
    </div>