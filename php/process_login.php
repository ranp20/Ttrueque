<?php
session_start();
$r = "";
if(isset($_POST) && $_POST != "" && count($_POST) > 0){
	if(isset($_POST['pass']) && $_POST['pass'] != ""){
		require_once 'class/client.php';
		$client = new Client();
		$pass =  password_hash($_POST['pass'], PASSWORD_BCRYPT, array('cost' => 12));
		$data = [
		  "mail" => $_POST["email"]
		];
		$verifyUser = $client->verify_login($data);
		if(!empty($verifyUser) && count($verifyUser) > 0){		
			if(password_verify($_POST['pass'], $verifyUser[0]["password_cliente"])){
		    if(password_verify('enabled', $verifyUser[0]["estado"]) && $verifyUser[0]["estado"] != "disabled"){
			    $_SESSION["user"] = $verifyUser[0]["id_cliente"];
			    $r = array(
			    	'res' => 'true'
			    );
		    }else{
		    	$r = array(
			    	'res' => 'cli-disable'
			    );
		    }
			}else{
				$r = array(
		    	'res' => 'false'
		    );
			}
		}else{
			$r = array(
	    	'res' => 'cli-notexists'
	    );
		}

	}else{
		$r = array(
	  	'res' => 'false'
	  );
	}
}
die(json_encode($r));