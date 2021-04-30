<?php
//LISTADO DE CATEGORÍAS DE LA CABECERA DEL HOME...
require_once "class/categoria.php";
require_once 'class/client.php';
require_once 'class/all.php';

$user = !isset($_SESSION["user"])  ? "" : $_SESSION["user"];
//LISTAR CATEGORIA...
$c = new Categoria();
$categoria = $c->get_categoria();
$cat_limit = $c->get_categoria_limit();
//LISTAR TIENDA...
$tienda = $c->get_data_tienda($user);
$c = new Client();
$d = $c->get_data_by_id($user);
//LISTAR TODO...
$ctr = new All();
$flags = $ctr->get_countries();

$c->close_connection();

$all_categorias = [];
$categoria_actual = "";

unset($categoria_actual);


//TÍTULO DE LA CABECERA DEL HOME...
require_once 'class/header_titles.php';
$h = new Header_Titles();
$header = $h->get_header_titles();
$c->close_connection();

$titles_header_home = [];
array_push($titles_header_home, $header);
