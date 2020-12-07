<?php
require_once 'class/admin.php';
$admin = new Admin();

function set_message($msg, $location)
{
    $_SESSION["error"] = $msg;
    header("Location: $location");
}

if (isset($_POST["login"])) {
    session_start();

    if (isset($_GET["change"])) {
    } else {
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $response = $admin->login_admin($user, $pass);

        switch ($response) {
            case "ok":
                $_SESSION["user_admin"] = $user;

                header("Location: ../admin/dashboard.php");

                break;
            case "fail":
                set_message("<div class='alert alert-danger smsadmin-erroralert' role='alert'>
                  <a href='../admin/.' class='alert-link'>Error!</a>. Usuario o contraseña fallida.
                </div>", "../admin/.");
                break;
            case "error":
                set_message("<div class='alert alert-danger smsadmin-erroralert' role='alert'>
                  <a href='../admin/.' class='alert-link'>Error!</a>. Lo sentimos, ocurrió un error en el servidor.
                </div>", "../admin/.");
                break;
        }
    }
}
