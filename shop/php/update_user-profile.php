<?php 

session_start();

if(isset($_SESSION['user'])){

$array_client = [
    "name" => $_POST['name_cli'],
    "pass1" => $_POST['pass_cli1'],
    "address" => $_POST['address_cli'],
    "country" => $_POST['country_cli'],
    "city" => $_POST['city_cli'],
    "cod_postal" => $_POST['cod_postal_cli'],
    "telephone" => $_POST['telephone_cli'],
    "id_cli" => (int) $_POST['id_cli']
];

    require_once '../../php/class/client.php';
    $c = new Client();
    $c->update_client($array_client);

    if($c){
        echo "Modificado Correctamente";
    }else{
        echo "Error al modificar";
    }
        

}
