<?php
session_start();


if (isset($_POST['tipo']) && isset($_POST['precio']) && isset($_POST['submit'])) {
    require_once("class/wallet_client.php");
    $wc = new Wallet_client();
    $imagen = $_FILES['image'];
    $tipo = $_POST['tipo'];
    $cap_carga = ((int) $_POST['precio']) * 2;
    $precio = $_POST['precio'];


    if ($_FILES['image']['error'] > 0) {
        $_SESSION["msg"] = "Error al cargar el archivo";
    } else {
        $admitido = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
        $limit_kb = 1000;

        if (in_array($_FILES['image']['type'], $admitido) && $_FILES['image']['size'] <= $limit_kb * 1024) {
            $path = '../admin/images/recargas/';
            $img = $path . $_FILES['image']['name'];
            // if (!file_exists($img)) {
            $res = @move_uploaded_file($_FILES['image']['tmp_name'], $img);
            if ($res) {

                header("Location: ../admin/add-recarga.php");
            } else {
                $_SESSION["msg"] = "Error al guardar el archivo";
            }
            // } else {
            //     $_SESSION["msg"] = "El archivo ya existe";
            // }
        } else {
            $_SESSION["msg"] = "Archivo no permitido o excede el tamaño";
        }
    }

    $response = $wc->add_wallet_client($imagen['name'], $tipo, $cap_carga, $precio);
} else {
    $_SESSION['msg'] = 'Error al agregar uno a más registros';
    header("Location: ../admin/add-recarga.php");
}

header("../admin/manage_recargas.php");
