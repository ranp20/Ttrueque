<?php
session_start();

function error_message($msg, $location)
{
    $msg = $_SESSION['error'];
    header("Location: $location");
}

if (isset($_GET['id'])) {
    require_once('class/wallet_client.php');
    $id = $_GET['id'];

    $wc = new Wallet_client();
    if ($id) {
        $res = $wc->delete_wallet_client($id);
    } else {
        error_message("Error al eliminar el registro", "../admin/manage_recargas.php");
    }
}

header('Location: ../admin/manage_recargas.php');
