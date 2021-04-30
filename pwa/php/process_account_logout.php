<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["buy_cart"]);
unset($_SESSION["position_cart_index"]);
unset($_SESSION["checkout_store"]);
unset($_SESSION['idtienda_m']);
unset($_SESSION['idcountries']);
unset($_SESSION['cant_m']);
header("Location: ../");
