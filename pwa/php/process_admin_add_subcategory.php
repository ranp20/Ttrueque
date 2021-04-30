<?php

session_start();
require_once("class/categoria.php");
$c = new Categoria();
    
if(isset($_POST['categorias'])){
    $id_categoria = $_POST['categorias'];
    $nombre = $_POST['subcategoria'];
    
    $res = $c->add_subcategory($id_categoria,$nombre); 

}

header("location:../admin/manage-subcategory.php");
