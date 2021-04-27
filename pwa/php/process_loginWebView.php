<?php 

$password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));

if(isset($_POST)){
	require_once '../controllers/verify-user-login.php';
	$loginUser = new VerifyLoginUser();

	$arr_verify = [
		"email" => $_POST['email'],
	];
	
	$verify = $loginUser->verifyUser($arr_verify);

	if($verify != []){

		if(password_verify($_POST['password'], $verify[0]["password_cliente"]) && password_verify('enabled', $verify[0]["estado"])){
			
			require_once '../controllers/get_user-by-id.php';
			
			$id = $verify[0]['id_cliente'];
			$getUser = new getUserData();
			$getID = $getUser->getData($id);

			if($getID > 0){
				session_start();
				
				//$_SESSION['user'] = $_SESSION['user'];
				$_SESSION['user'] = $getID;
				
				$response = [
					'response' => 'true'
				];
			}else{
				echo "Error al validar los datos del usuario";
			}

		}else{
			$response = [
				'response' => 'false'
			];
		}
	}else{
		$response = [
			'response' => 'false'
		];
	}
}

die(json_encode($response));