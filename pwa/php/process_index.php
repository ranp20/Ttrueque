<?php
require_once 'class/product.php';
require_once 'class/banner.php';
require_once 'class/admin.php';
$p = new Product();
$banner = new Banner();
$idadmin = new Admin();
$data = [
    "populars" => $p->most_popular(),
    "banners" => $p->get_banners(),
    "banner_publicidad" => $banner->get_banner_pub(),
    //"idprodadmin" => $idadmin->get_idprodadmin()
];
$p->close_connection();
