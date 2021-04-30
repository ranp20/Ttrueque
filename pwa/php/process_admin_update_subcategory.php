<?php 

session_start();

if(isset($_POST['save_sub'])){
    require_once('class/categoria.php');
    $c = new Categoria();
    $categorias = $_POST['categorias'];
    $subcategoria = $_POST['subcategoria'];
    $id = $_POST['id'];

    $res = $c->update_subcategory($categorias,$subcategoria,$id);

}

header('Location: ../admin/manage-subcategory.php');

?>