<?php

session_start();

require_once('class/wallet_client.php');
$wc = new Wallet_client();

if (isset($_POST['submit'])) {

    $image = $_FILES['image']['name'] == "" ? $_POST['image'] : $_FILES['image']['name'];
    $tipo = $_POST['tipo'];
    $cap_carga = $_POST['cap_carga'];
    $precio = $_POST['precio'];
    $id = $_POST['id'];

    if ($_FILES['image']['error'] > 0) {
        echo 'Error al cargar el archivo';
    } else {
        $admitido = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
        $limit_kb = 1000;

        if (in_array($_FILES['image']['type'], $admitido) && $_FILES['image']['size'] <= $limit_kb * 1024) {
            $path = '../admin/images/recargas/';
            $img = $path . $_FILES['image']['name'];

            if (!file_exists($img)) {
                $res = move_uploaded_file($_FILES['image']['tmp_name'], $img);

            }
        } else {
            echo "Arhivo no permitido o excede el tamaño";
        }
    }

    $res = $wc->update_wallet_client($image, $tipo, $cap_carga, $precio, $id);
    echo $res;
    header('location: ../admin/manage_recargas.php');
}
