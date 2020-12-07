<?php
include  '../ajax/list-sales_report.php';

if(!isset($_GET['store']) || !isset($_GET['month']) || !isset($_GET['year']) || $_GET['store'] == "" || $_GET['month'] == "" ||  $_GET['year'] == ""){
  header('Location: .././');
}else if(!is_numeric($_GET['store']) || !is_numeric($_GET['month']) || !is_numeric($_GET['year'])){
  header('Location: .././');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Reporte Cliente</title>
  <link rel="stylesheet" href="../css/report-pdf.css" media="all" />
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
            <span><?php echo $result[0]['nombre_store']; ?></span>
          </div>
        </li>
        <li>
          <div>
            <span class="address">DIRECCIÓN &nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span><?php echo $result[0]['direccion_store']; ?></span>
          </div>
        </li>
        <li>
          <div>
            <span class="email">EMAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span><?php echo $result[0]['email_store']; ?></span>
          </div>
        </li>
        <li>
          <div>
            <span class="femision">F.EMISIÓN &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span><?php echo date("d/m/Y") . " " . date("h:m:s A") ?></span>
          </div>
        </li>
      </ul>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th style="text-align: center;width: 13%;padding: 5px 0px;">N° Orden</th>
          <th style="text-align: left;">Cliente</th>
          <th style="text-align: center;">Teléfono</th>
          <th style="text-align: left;">Dirección</th>
          <th style="text-align: center;">Estado</th>
          <th style="text-align: right;width: 16%;">Total</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $contador = 0;
        foreach ($result as $value) {
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
        $totalorder = 0;
        foreach ($result as $value) {
          $totalorder += $value["total"];
        } ?>
        <tr>
          <td style="padding-right: 2rem;" colspan="5">SUBTOTAL</td>
          <td class="total"><?php echo $totalorder; ?> Puntos</td>
        </tr>
        <tr>
          <td style="padding-right: 2rem;" colspan="5">IMPUESTO 8%</td>
          <td class="total"><?php $impuesto = ($totalorder*8)/100; echo $impuesto;  ?> Puntos</td>
        </tr>
        <tr>
          <td style="padding-right: 2rem;" colspan="5" class="grand total">GRAN TOTAL</td>
          <td class="grand total"><?php echo $totalorder - $impuesto; ?> Puntos</td>
        </tr>
      </tbody>
    </table>
  </main>
  <footer>
    La factura fue creada en una computadora y es válida sin la firma y el sello.
  </footer>
</body>

</html>