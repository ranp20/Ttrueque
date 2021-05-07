<?php
session_start();
require_once("class/client.php");
$client = new Client();
function set_message($msg, $location)
{
    $_SESSION["error"] = $msg;
    header("Location: $location");
}
$pass =  password_hash($_POST['pass'], PASSWORD_BCRYPT, array(
    'cost' => 12
));
if (isset($_GET["login"])) {
    $data = [
        "mail" => $_POST["email"],
        // "pass" =>   $_POST['pass'],
    ];
    $data = $client->verify_login($data);
    if (password_verify($_POST['pass'], $data[0]["password_cliente"]) && password_verify('enabled', $data[0]["estado"])) {
        $_SESSION["user"] = $data[0]["id_cliente"];
        header("Location: .././");
        //echo '<script> location.replace("./"); </script>';
    } else {
        set_message("Usuario o contraseña fallida", "../login");
    }
} else if (isset($_GET["register"])) {
    $post_data_register = [
        "mail" => $_POST["mail"],
        "pass" => $pass,
        "name" => $_POST["name"] == "" ? "No definido" : $_POST["name"],
        "lastname" => $_POST["lastname"] == "" ? "No definido" : $_POST["lastname"],
        "direction" => $_POST["direction"],
        "country" => $_POST["country"],
        "phone" => (int) $_POST["phone"],
        "id_rubro" => (int) $_POST["rubro"]
    ];
    if (!$client->get_mail($post_data_register["mail"]))
        set_message("<div class='alert alert-warning alert-dismissible fade show' role='alert' style='width:auto !important;'>
            <strong style='font-weight:bold;'>Atención!</strong> Este usuario ya se encuentra registrado.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button></div>
            ", "../account");
    else if ($post_data_register["phone"] == 0) {
        set_message("   <div class='alert alert-warning alert-dismissible fade show' role='alert' style='width:auto !important;'>
            <strong style='font-weight:bold;'>Atención!</strong> Número de teléfono no válido.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button></div>
            ", "../account");
    } else {
        $response = $client->add_client($post_data_register);
        if ($response == "true") {
        //   require_once("../email/call-form.php");
            set_message("<div class='alert alert-success alert-dismissible fade show' role='alert' style='width:auto !important;'><strong style='font-weight:bold;'>Éxito!</strong> Usuario creado correctamente. Por favor verifique su correo electrónico para activar su cuenta.
                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button> </div>", "../account");
              require_once("../email/call-form.php");                         
            // header("Location: ../account");
           
        } else if ($response == "false") {
            set_message("Ocurrio un error al registrase", "../account");
        } else {
            set_message($response, "../account");
        }
    }
}