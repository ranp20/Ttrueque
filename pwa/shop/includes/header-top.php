<div class="content-btn-toggle-dashboard-dc">
  <div class="c-left-btn-tdc">
      <i class="lni lni-menu" id="btn-tdc-toggle"></i>
  </div>
  <div class="c-center-btn-tdc">
    <a href="wallet-info.php">
      <span class="lang_ttrq" key="txt-saldo-top-ad_cli">Saldo</span>
      <span>:&nbsp;<?php foreach($d as $val){echo $val['puntos'];}?>&nbsp;</span>
      <span class="lang_ttrq" key="txt-points-top-ad_cli">Puntos</span>
    </a>
  </div>
  <div id="btn-show-rigth-actions">
    <i class="lni lni-more"></i>
  </div>
  <div class="c-right-btn-tdc">
    <div class="container-memb-rest_cli">
      <form action="#" method="POST">
        <input type="hidden" name="tiendamemb" id="tiendamemb" value="<?php echo $_SESSION['idtienda_m'] = $d[0]['tienda']; ?>">
        <input type="hidden" name="cantidadmemb" id="cantidadmemb" value="<?php echo $_SESSION['cant_m'] = $d[0]['cantidad'];?>">
        <button class="canttienda_ttrq lang_ttrq" id="datamemb">
          <div class="content-memb-rest_cli">
              <div style="background-image: url(images/gold.png);"></div>
          </div>
          <!--<span class="lang_ttrq" key="txt-membership-top-ad_cli">Membresía</span>-->
        </button>
      </form>
    </div>
    <a href="../" target="_blank" id="cont-linkAllStores--desktop">
      <!--<i class='lni lni-display'></i>-->
      <span class="lang_ttrq" key="txt-go-to-home-top-ad_cli">Tiendas Ttrueque</span>
    </a>
  </div>
</div>