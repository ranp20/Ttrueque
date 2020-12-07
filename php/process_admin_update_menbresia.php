<?php

session_start();

require_once('class/menbresia.php');
$c = new Menbresia();

if (isset($_POST['submit'])) {

    $image = $_FILES['image']['name'] == "" ? $_POST['image'] : $_FILES['image']['name'];
    $tipo = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    $precio_eeuu = $_POST['precio-eeuu'];
    $descrip = htmlspecialchars($_POST['desc']);

    $descrip = $_POST['desc'];

    $id = $_POST['id'];

    if ($_FILES['image']['error'] > 0) {
        echo 'Error al cargar el archivo';
    } else {
        $admitido = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
        $limit_kb = 1000;

        if (in_array($_FILES['image']['type'], $admitido) && $_FILES['image']['size'] <= $limit_kb * 1024) {
            $path = '../admin/images/menbresia/';
            $img = $path . $_FILES['image']['name'];

            if (!file_exists($img)) {
                $res = move_uploaded_file($_FILES['image']['tmp_name'], $img);


                // if ($res) {
                //     // $_SESSION["msg"] = "Archivo guardado correctamente";
                // } else {
                //     echo 'Error al guardar';
                // }
            }
        } else {
            echo "Arhivo no permitido o excede el tamaño";
        }
    }

    $res = $c->update_menbresia($image, $tipo, $cantidad, $precio_eeuu, $descrip, $id);
    echo $res;
    header('location: ../admin/manage-menbresia.php');
}
