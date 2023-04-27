<div class="content-ttrk-official-markets-c margintb-3" id="cont-all-stores-in-ttrk">
	<div class="cMIndx__c__sec__cTtitle contenido-tiendas-off-header">
		<div class="cMIndx__c__sec__cTtitle__c content-title-tiendas">
			<h3 class="cMIndx__c__sec__cTtitle__c--title lang_ttrq" key="title_official_markets">Nuestras tiendas</h3>
		</div>
	</div>
	<div class="container-content-off-mrkts" id="cont-filter-off-markets">
		<section class="list-stores-officials-ttrk-c" id="cont-list-filter-off-markets">
			<ul class="items-str-off-ttrk">
				<!-- //ITEMS - TIENDAS OFICIALES EN TTRUEQUE-->
				<?php

				$slice_tiendas = array_slice($dat, 0, 10);

				foreach ($slice_tiendas as $val){
					$urlpath = $_SERVER['DOCUMENT_ROOT']."/Ttrueque/shop/images/store/".$val['logo'];
								$urlpath_default = "../Ttrueque/shop/images/store/default-store.png";
								if($val['logo'] == "default-store.png"){
									echo "
									<li class='item-str-off-into'>
										<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
											<span class='cont-logo-offi-mrkt-b-ttrk' style='box-sizing: border-box;display: inline-block;overflow: hidden;width: initial;height: initial;background: none;opacity: 1;border: thin solid #ebebeb;margin: 0px;padding: 0px;position: relative;max-width: 100%;background-color: #fff;border-radius: 8px;'>
												<span style='box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;'>
													<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' style='display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;'>
												</span>
												<img src='../Ttrueque/shop/images/store/default-store.png' alt='{$val['nombre_tienda']}' class='logo-off-mrkt-c-ttrk img-fluid' style='position: absolute;inset: 0px;box-sizing: border-box;padding: 0px;border: none;margin: auto;display: block;width: 0px;height: 0px;min-width: 80%;max-width: 80%;min-height: 80%;max-height: 80%;object-fit:cover;border-radius: 8px;vertical-align: top;' decoding='async'>
											</span>
											<div class='cont-info-offi-mrkt-b-ttrk'>
												<p>" . ucwords($val['nombre_tienda']) . "</p>
											</div>
										</a>
									</li>
									";
								}else{
									if(!file_exists($urlpath)){
										echo "
										<li class='item-str-off-into'>
											<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
												<span class='cont-logo-offi-mrkt-b-ttrk' style='box-sizing: border-box;display: inline-block;overflow: hidden;width: initial;height: initial;background: none;opacity: 1;border: thin solid #ebebeb;margin: 0px;padding: 0px;position: relative;max-width: 100%;background-color: #fff;border-radius: 8px;'>
													<span style='box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;'>
														<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' style='display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;'>
													</span>
													<img src='../Ttrueque/shop/images/store/default-store.png' alt='{$val['nombre_tienda']}' class='logo-off-mrkt-c-ttrk img-fluid' style='position: absolute;inset: 0px;box-sizing: border-box;padding: 0px;border: none;margin: auto;display: block;width: 0px;height: 0px;min-width: 80%;max-width: 80%;min-height: 80%;max-height: 80%;object-fit:cover;border-radius: 8px;vertical-align: top;' decoding='async'>
												</span>
												<div class='cont-info-offi-mrkt-b-ttrk'>
													<p>" . ucwords($val['nombre_tienda']) . "</p>
												</div>
											</a>
										</li>
										";
									}else{
										echo "
										<li class='item-str-off-into'>
											<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
												<span class='cont-logo-offi-mrkt-b-ttrk' style='box-sizing: border-box;display: inline-block;overflow: hidden;width: initial;height: initial;background: none;opacity: 1;border: thin solid #ebebeb;margin: 0px;padding: 0px;position: relative;max-width: 100%;background-color: #fff;border-radius: 8px;'>
													<span style='box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;'>
														<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' style='display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;'>
													</span>
													<img src='../Ttrueque/shop/images/store/{$val['logo']}' alt='{$val['nombre_tienda']}' class='logo-off-mrkt-c-ttrk img-fluid' style='position: absolute;inset: 0px;box-sizing: border-box;padding: 0px;border: none;margin: auto;display: block;width: 0px;height: 0px;min-width: 100%;max-width: 100%;min-height: 100%;max-height: 100%;object-fit:cover;border-radius: 8px;vertical-align: top;' decoding='async'>
												</span>
												<div class='cont-info-offi-mrkt-b-ttrk'>
													<p>" . ucwords($val['nombre_tienda']) . "</p>
												</div>
											</a>
										</li>
										";
									}
								}
				}
				?>
				<!-- //END TO ITEMS-->
			</ul>
		</section>
		<div class="content-btn-more-brands-ttrk" id="btn-filter-stores-index">
			<h3>			
				<a href="allstores" class="btn-brands-alls-ttrk">
					<button type="button" class="btn-into-alls-ttrk lang_ttrq" key="btn-all-stores_ttrq">Ver todas las tiendas</button>
				</a>
			</h3>
		</div>
	</div>