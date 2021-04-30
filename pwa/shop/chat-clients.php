<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
    header('location: ../cliente/menbresia');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajería con el vendedor</title>
    <?php require_once 'includes/head.php'; ?>
</head>
<body>
  <div class="container active">
    <!-- NAVBAR LEFT -->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT CHAT-CLIENTS -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-top">
        <div class="content-title">
          <h1 class="title-dashboard lang_ttrq" key="title-top-chat-ad_cli">Conversaciones</h1>
        </div>
      </div>
      <div class="content-chat">
        <div class="content-body-chat">
          <ul class="list-chat">
            <li>
              <div class="content_client-photo-y-dates">
                <img src="images/elon-musk-retrato.jpeg" alt="" width="50" height="50">
                <div class="client-dates">
                  <h5>Sr. Vendedor</h5>
                  <p>11.52.01 26-01-2020</p>
                </div>
              </div>
              <div class="products-dates">
                <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus.</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aliquid consequatur perspiciatis aspernatur labore suscipit eius tempora cumque tenetur saepe corrupti, dolorem quisquam odio dolore omnis similique, alias hic fugit id vitae pariatur voluptates voluptatum sapiente? Fuga corrupti blanditiis porro consequatur saepe eius eos voluptatibus recusandae vel perspiciatis similique vitae autem amet, nam cupiditate sunt quae enim culpa praesentium consequuntur!</p>
              </div>
            </li>
            <li>
              <div class="content_client-photo-y-dates">
                <img src="images/elon-musk-retrato.jpeg" alt="" width="50" height="50">
                <div class="client-dates">
                  <h5>Sr. Vendedor</h5>
                  <p>11.52.01 26-01-2020</p>
                </div>
              </div>
              <div class="products-dates">
                <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit neque necessitatibus eligendi suscipit repellat. Corrupti obcaecati itaque distinctio alias est?</p>
              </div>
            </li>
            <li>
              <div class="content_client-photo-y-dates">
                <img src="images/elon-musk-retrato.jpeg" alt="" width="50" height="50">
                <div class="client-dates">
                  <h5>Sr. Vendedor</h5>
                  <p>11.52.01 26-01-2020</p>
                </div>
              </div>
              <div class="products-dates">
                <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit neque necessitatibus eligendi suscipit repellat. Corrupti obcaecati itaque distinctio alias est?</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
  <script src="js/dashboard.js"></script>
</body>
</html>