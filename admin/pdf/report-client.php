<?php
//Ruta del controlador 
include  '../../php/class/list_cart_report_admin.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Example 1</title>
  <link rel="stylesheet" href="../css/customs/report_pdf.css" media="all" />
  <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>
  <header class="clearfix">
    <div id="logo">
      <img src="../../img/logo/Logo_TTRK.png" width="150px">
    </div>
    <h1>Reporte de Venta Mensual</h1>
    <div id="company" class="clearfix">
      <h2>FACTURA ELECTRÓNICA</h2>
      <div>&copy;Ttrueque</div>
      <div>(+51) 951488317</div>
      <div><a href="megarejo777666@gmail.com.com">megarejo777666@gmail.com.com</a></div>
    </div>
    <div id="project">
      <ul>
        <li>
          <div>
            <span class="store">TIENDA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>Ttrueque</span>
          </div>
        </li>
        <li>
          <div>
            <span class="address">DIRECCIÓN &nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>Jr. Las Flores 545</span>
          </div>
        </li>
        <li>
          <div>
            <span class="email">EMAIL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>Administrador@gmail.com</span>
          </div>
        </li>
        <li>
          <div>
            <span class="femision">F.EMISIÓN &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span><?php echo date("d/m/Y") . " ". date("h:m:s A") ?></span>
          </div>
        </li>
      </ul>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th style="text-align: center;width: 15%;">N° Orden</th>
          <th style="text-align: center;">Cliente</th>
          <th style="text-align: center;">Teléfono</th>
          <th style="text-align: center;">Dirección</th>
          <!--<th style="text-align: center;">Tienda</th>-->
          <th style="text-align: center;">Estado</th>
          <th style="text-align: center;">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $contador = 0;
        foreach ($data_report as $value) {
          $contador++;
          echo '
          <tr>
            <td style="text-align: center;">'.$contador.'</td>
            <td style="text-align: left;" class="desc">'.$value["nombre"].' '.$value["apellido"].'</td>
            <td style="text-align: center;" class="unit">'.$value["celular"].'</td>
            <td style="text-align: left;" class="qty">'.$value["direccion"].'</td>
            <td style="text-align: center;" class="total">'.$value["estado"].'</td>
            <td style="text-align: right;" class="total">'.$value["total"].' '.'Puntos</td>
          </tr>
          ';
        } ?>
        <?php
        $totalorder_admin = 0;
        foreach ($data_report as $value) {
          $totalorder_admin += $value["total"];
        } ?>
        <tr>
          <td style="padding-right: 2rem;" colspan="5">SUBTOTAL</td>
          <td class="total"><?php echo $totalorder_admin; ?> Puntos</td>
        </tr>
        <tr>
          <td style="padding-right: 2rem;" colspan="5">IMPUESTO 8%</td>
          <td class="total"><?php $impuesto = ($totalorder_admin*8)/100; echo $impuesto;  ?> Puntos</td>
        </tr>
        <tr>
          <td style="padding-right: 2rem;" colspan="5" class="grand total">GRAN TOTAL</td>
          <td class="grand total"><?php echo $totalorder_admin - $impuesto; ?> Puntos</td>
        </tr>
      </tbody>
    </table>
  </main>
  <footer>
    La factura fue creada en una computadora y es válida sin la firma y el sello.
  </footer>
</body>
</html>