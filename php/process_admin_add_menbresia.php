<?php
session_start();


if (isset($_POST['tipo']) && isset($_POST['cantidad']) && isset($_POST['precio-eeuu']) && isset($_POST['submit'])) {
    require_once("class/menbresia.php");
    $c = new Menbresia();
    $imagen = $_FILES['image'];
    $tipo = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    $precio_eeuu = $_POST['precio-eeuu'];
    $descrip = $_POST['desc'];


    if ($_FILES['image']['error'] > 0) {
        $_SESSION["msg"] = "Error al cargar el archivo";
    } else {
        $admitido = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
        $limit_kb = 1000;

        if (in_array($_FILES['image']['type'], $admitido) && $_FILES['image']['size'] <= $limit_kb * 1024) {
            $path = '../admin/images/menbresia/';
            $img = $path . $_FILES['image']['name'];
            // if (!file_exists($img)) {
            $res = @move_uploaded_file($_FILES['image']['tmp_name'], $img);
            if ($res) {

                header("Location: ../admin/add-menbresia.php");
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

    $response = $c->add_menbresia($imagen['name'], $tipo, $cantidad, $precio_eeuu, $descrip);
    header("Location: ../admin/manage-menbresia.php");
    // print_r($response);
    // exit();
} else {
    $_SESSION['msg'] = 'Error al agregar uno a más registros';
    header("Location: ../admin/add-menbresia.php");
}