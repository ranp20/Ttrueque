<?php
require_once 'class/product.php';
$p = new Product();
$data = [
    "banner_principal" => $p->get_banner_p()
];
$p->close_connection();
