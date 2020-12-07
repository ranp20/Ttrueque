<div class="content-btn-toggle-dashboard-dc">
  <div class="c-left-btn-tdc">
      <i class="lni lni-menu" id="btn-tdc-toggle"></i>
  </div>
  <div class="c-center-btn-tdc">
    <a href="wallet-info.php">
      <span class="lang_ttrq" key="txt-saldo-top-ad_cli">Saldo:</span>
      <?php foreach($d as $val){echo $val['puntos'];}?>
      <span class="lang_ttrq" key="txt-points-top-ad_cli"> Puntos</span>
    </a>
  </div>
  <div class="c-right-btn-tdc">
    <div class="container-memb-rest_cli">
      <!-- <input type="hidden" class="tipo_m-store">
      <input type="hidden" class="selidtienda"> -->
      <form action="#" method="POST">
        <input type="hidden" name="tiendamemb" id="tiendamemb" value="<?php echo $_SESSION['idtienda_m'] = $d[0]['tienda']; ?>">
        <input type="hidden" name="cantidadmemb" id="cantidadmemb" value="<?php echo $_SESSION['cant_m'] = $d[0]['cantidad'];?>">

        <button class="canttienda_ttrq" id="datamemb">
            <div class="content-memb-rest_cli">
                <div style="background-image: url(images/gold.png);"></div>
            </div>
        </button>
      </form>
    </div>
    <a href="../" target="_blank"><i class='lni lni-display'></i>
      <span class="lang_ttrq" key="txt-go-to-home-top-ad_cli">Ir al sitio</span>
    </a>
  </div>
</div>