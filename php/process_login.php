<?php 
session_start();
require_once 'class/client.php';
$client = new Client();
$pass =  password_hash($_POST['pass'], PASSWORD_BCRYPT, array(
  'cost' => 12
));

if (isset($pass)) {
	$data = [
	  "mail" => $_POST["email"],
	];
	$verifyUser = $client->verify_login($data);
	if (password_verify($_POST['pass'], $verifyUser[0]["password_cliente"]) && password_verify('enabled', $verifyUser[0]["estado"])) {
    $_SESSION["user"] = $verifyUser[0]["id_cliente"];

    $res = array(
    	'response' => 'true'
    );
	} else {
		$res = array(
    	'response' => 'false'
    );
	}
}else{
	$res = array(
  	'response' => 'false'
  );
}
die(json_encode($res));