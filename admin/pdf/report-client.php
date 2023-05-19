<?php
//Ruta del controlador 
include  '../../php/class/list_cart_report_admin.php'; 

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Example 1</title>
  <link rel="stylesheet" href="../css/customs/report_pdf.css" media="all" />
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <style type="text/css">
    /* report_pdf.css */
/* PLANTILLA DE INTERNET */
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
.clearfix-store{
  content: "";
  display: table;
  clear: both;
  width: 200px; 
}
a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

ul{
  list-style: none !important;
  padding-left: 0;  
  margin: .15em 0 !important;
}
li div{
  display: inline-flex;
}
li div span{
  color: #000 !important;
}
p{
  margin-bottom: 0;
}
span.store,
span.client,
span.address,
span.email,
span.femision{
  color: #7B150E !important;
  font-weight: bold;
  margin-bottom: 20px !important;
}
#logo {
  text-align: left;
  margin-bottom: 8px;
  padding-bottom: 10px;
  border-bottom: 1px solid  #5D6975;
}

i{
  margin-right: 10px;
}

#logo_store{
  width: 100%;
  height: 100px;
  float: right;
  text-align: right;
}
#logo_store img{
  width: 100px;
  height: 100px;
}

#project {
  float: left;
  border-left: 4px solid #0087C3;
  padding-left: 1em;
}

#project span {
  color: #444;
  text-align: left;
  width: 85px;
  margin-right: 80px;
  display: inline-block;
  font-size: 1.2em;
}

#project ul li{
  margin-bottom: 8px;
}
#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th:first-child{
  padding: 5px 0px;
}
table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
  font-size: 1rem;
}


table td {
  padding: 15px 5px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: middle;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1em;
}


table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}

#info-primary-report tr td{
  margin: 0;
  padding: 0;
}
#info-primary-report tr td:first-child{
  border-left: 4px solid #0087C3;
  padding-left: 1em;
  text-align: left;
  float: left;
}

#info-general-store{
  float: left;
  text-align: left;
  width: 100%;
  height: 100%;
}
#info-general-store ul{
  list-style: none;
  padding-left: 0;
  margin: 0;
}
#info-general-store ul li{
  text-align: left;
}
#info-general-store ul li div{
  text-align: left;
}
#info-general-store ul li div span{
  text-align: left;
}
#name-str{
  text-align: left;
}
h1{
  text-align: center;
  color: grey;
  font-size: 30px;
}
  </style>
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