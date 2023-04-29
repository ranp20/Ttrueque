<div class="content-ttrk-official-markets-c margintb-3" id="cont-all-stores-in-ttrk">
	<div class="cMIndx__c__sec__cTtitle contenido-tiendas-off-header">
		<div class="cMIndx__c__sec__cTtitle__c content-title-tiendas">
			<h3 class="cMIndx__c__sec__cTtitle__c--title lang_ttrq" key="title_official_markets">Nuestras tiendas</h3>
		</div>
	</div>
	<div class="cMIndx__c__sec__cC container-content-off-mrkts" id="cont-filter-off-markets">
		<section class="cMIndx__c__sec__cC__Sc list-stores-officials-ttrk-c" id="cont-list-filter-off-markets">
			<div class="cMIndx__c__sec__cC__Sc--cMLstStores">
				<ul class="cMIndx__c__sec__cC__Sc--cMLstStores__m items-str-off-ttrk">
					<!-- //ITEMS - TIENDAS OFICIALES EN TTRUEQUE-->
					<?php

					$slice_tiendas = array_slice($dat, 0, 10);

					foreach ($slice_tiendas as $val){
						$urlpath = $_SERVER['DOCUMENT_ROOT']."/Ttrueque/shop/images/store/".$val['logo'];
									$urlpath_default = "../Ttrueque/shop/images/store/default-store.png";
									if($val['logo'] == "default-store.png"){
										echo "
										<li class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i dft-icon-str item-str-off-into'>
											<a href='productos?store={$val['nombre_tienda']}' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link item-cont-str-off btn_get_to_trademarks' >
												<span class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo cont-logo-offi-mrkt-b-ttrk'>
													<span class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--cBxImgShadow'>
														<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--cBxImgShadow__img'>
													</span>
													<img src='../Ttrueque/shop/images/store/default-store.png' alt='{$val['nombre_tienda']}' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--ImgTrue logo-off-mrkt-c-ttrk img-fluid' decoding='async'>
												</span>
												<div class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cDsc cont-info-offi-mrkt-b-ttrk'>
													<p>" . ucwords($val['nombre_tienda']) . "</p>
												</div>
											</a>
										</li>
										";
									}else{
										if(!file_exists($urlpath)){
											echo "
											<li class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i dft-icon-str item-str-off-into'>
												<a href='productos?store={$val['nombre_tienda']}' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link item-cont-str-off btn_get_to_trademarks' >
													<span class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo cont-logo-offi-mrkt-b-ttrk'>
														<span class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--cBxImgShadow'>
															<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--cBxImgShadow__img'>
														</span>
														<img src='../Ttrueque/shop/images/store/default-store.png' alt='{$val['nombre_tienda']}' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--ImgTrue logo-off-mrkt-c-ttrk img-fluid' decoding='async'>
													</span>
													<div class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cDsc cont-info-offi-mrkt-b-ttrk'>
														<p>" . ucwords($val['nombre_tienda']) . "</p>
													</div>
												</a>
											</li>
											";
										}else{
											echo "
											<li class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i item-str-off-into'>
												<a href='productos?store={$val['nombre_tienda']}' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link item-cont-str-off btn_get_to_trademarks' >
													<span class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo cont-logo-offi-mrkt-b-ttrk'>
														<span class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--cBxImgShadow'>
															<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--cBxImgShadow__img'>
														</span>
														<img src='../Ttrueque/shop/images/store/{$val['logo']}' alt='{$val['nombre_tienda']}' class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cLogo--ImgTrue logo-off-mrkt-c-ttrk img-fluid' decoding='async'>
													</span>
													<div class='cMIndx__c__sec__cC__Sc--cMLstStores__m__i--link__cDsc cont-info-offi-mrkt-b-ttrk'>
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
			</div>
			<div class="cMIndx__c__sec__cC__Sc--cMLstStores-sec content-btn-more-brands-ttrk" id="btn-filter-stores-index">
				<h3>			
					<a href="allstores" class="btn-brands-alls-ttrk">
						<button type="button" class="btn-into-alls-ttrk lang_ttrq" key="btn-all-stores_ttrq">Ver todas las tiendas</button>
					</a>
				</h3>
			</div>
		</section>
	</div>