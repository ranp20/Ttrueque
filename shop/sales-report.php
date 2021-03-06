<?php
session_start();
//echo $d[0]['id_cliente'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informe de Ventas</title>
  <?php require_once 'includes/head.php'; ?>
  
</head>

<body>
  <div class="container-total active">
    <!-- NAVBAR LEFT -->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT FULL HISTORY SHIPPINGS  -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-top-sales-report">

        <div class="content-title-sales-report">
          <h1 class="title-dashboard lang_ttrq" key="title-top-salesreport-cli-ad_cli">Informe de Ventas</h1>
          <select class="input-product select-onehidden" id="select-mes"></select>
          <input type="hidden" id="tienda" value="<?php echo $d[0]['tienda']; ?>">
          <input type="hidden" class="sess_id_sr_client" value="<?php echo session_id(); ?>">
          <input type="hidden" id="id_mes">
          <p id="statedelivery"></p>
          <p id="stateconfirm"></p>
        </div>
        <div class="msm-days-left">
          <h6 id="calculo"></h6>
        </div>
      </div>
      <div class="cont-msg-monthly-sales">
        <h1><i class="lni lni-eye"></i>Si usted canceló este mes y aún recibe pedidos confirmados, sus aportes se estarán acumulando para el siguiente mes...</h1>
      </div>
      <table class="sales_report-table">
        <thead class="sales_report-thead">
          <tr>
            <th class="lang_ttrq">Mes</th>
            <th class="lang_ttrq">Total</th>
            <th class="lang_ttrq">Impuesto 8%</th>
            <th class="lang_ttrq">Año</th>
            <th class="lang_ttrq">Estado</th>
            <th class="lang_ttrq">Detalle</th>
            <th class="lang_ttrq">Opciones</th>
          </tr>
        </thead>
        <tbody class="sales_report-tbody" id="list_cartstore_idtienda">
        </tbody>
      </table>
    </section>
  </div>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">IR A PAGAR CON:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding: 2rem 4rem !important;">
            <!-- /BUTTON FOR PAYPAL-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          </div>
        </div>
      </div>
    </div>
  <!-- //SCRIPT FOR PAYPAL-->
  <script src="https://www.paypalobjects.com/api/checkout.js"></script>
  <script src="./js/dashboard.js"></script>
  <script src="./js/informe_ventas.js"></script>
</body>

</html>