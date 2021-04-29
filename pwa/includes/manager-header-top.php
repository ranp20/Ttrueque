<div class="content-btn-toggle-dashboard-dc">
  <div class="c-left-btn-tdc">
      <i class="lni lni-menu" id="btn-tdc-toggle"></i>
  </div>
  <div class="c-center-btn-tdc">
    <a href="manager-wallet-info.php">
      <span class="lang_ttrq" key="txt-saldo-top-ad_cli">Saldo</span>
      <span>:&nbsp;<?php foreach($d as $val){echo $val['puntos'];}?>&nbsp;</span>
      <span class="lang_ttrq" key="txt-points-top-ad_cli">Puntos</span>
    </a>
  </div>
  <div class="container-memb-rest_cli" style="margin-bottom: 0;">
    <form action="#" method="POST">
      <input type="hidden" name="tiendamemb" id="tiendamemb" value="<?php echo $_SESSION['idtienda_m'] = $d[0]['tienda']; ?>">
      <input type="hidden" name="cantidadmemb" id="cantidadmemb" value="<?php echo $_SESSION['cant_m'] = $d[0]['cantidad'];?>">

      <button class="canttienda_ttrq" id="datamemb">
          <div class="content-memb-rest_cli">
              <div style="background-image: url(../shop/images/gold.png);"></div>
          </div>
      </button>
    </form>
  </div>
</div>