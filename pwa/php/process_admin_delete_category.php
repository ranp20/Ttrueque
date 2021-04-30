<?php
session_start();

function error_message($msg, $location)
{
    $msg = $_SESSION['error'];
    header("Location: $location");
}

if (isset($_GET['id'])) {
    require_once('class/categoria.php');
    $id = $_GET['id'];

    $c = new Categoria();
    if ($id) {
        $res = $c->delete_category($id);
    } else {
        error_message("Error al eliminar el registro", "../admin/manage-category.php");
    }
}

header('Location: ../admin/manage-category.php');
