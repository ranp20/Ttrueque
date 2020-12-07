<?php
session_start();

function error_message($msg, $location)
{
    $msg = $_SESSION['error'];
    header("Location: $location");
}

if (isset($_GET['id'])) {
    require_once('class/menbresia.php');
    $id = $_GET['id'];

    $c = new Menbresia();
    if ($id) {
        $res = $c->delete_menbresia($id);
    } else {
        error_message("Error al eliminar el registro", "../admin/manage-menbresia.php");
    }
}

header('Location: ../admin/manage-menbresia.php');
