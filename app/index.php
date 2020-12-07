<?php
 header("Access-Control-Allow-Origin: *");
require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->post('/login', 'login');
$app->post('/restpoints', 'restpoints');
$app->post('/selectuserid', 'selectuserid');
$app->run();


function login() {
    
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        
        $db = getDB();
        $userData ='';
        $sql = "call sp_login_movil(:email_cliente,:telefono,:estado)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("email_cliente", $data->email_cliente, PDO::PARAM_STR);
        $stmt->bindParam("telefono", $data->telefono, PDO::PARAM_STR);
        $stmt->bindParam("estado", $data->estado, PDO::PARAM_STR);
        $stmt->execute();
        $mainCount=$stmt->rowCount();
        $userData = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($userData))
        {
            $user_id=$userData->id_cliente;
            $userData->token = apiToken($user_id);
        }
        
        $db = null;
         if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Bad request"}}';
            }

           
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}



function restpoints() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    $token=$data->token;
    $idclient=$data->idclient;
    $store=$data->store;
    $puntostotales=$data->puntostotales;

    $systemToken=apiToken();
    try {
         
        if($systemToken == $token){
            $db = getDB();
            $sqlorder = "call sp_rest_add_points(:idclient,:store,:puntostotales)";
            $stmtorder = $db->prepare($sqlorder);
            $stmtorder->bindParam("idclient", $idclient,PDO::PARAM_INT);
            $stmtorder->bindParam("store", $store,PDO::PARAM_INT);
            $stmtorder->bindParam("puntostotales", $puntostotales,PDO::PARAM_INT);
            $stmtorder->execute();
            $lastid = $db->lastInsertId();

            $db = null;
            echo '{"success":"' . $lastid .'"}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}



function selectuserid() {
    
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        
        $db = getDB();
        $userData ='';
        $sql = "call sp_select_user_id(:id_cliente)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id_cliente", $data->id_cliente, PDO::PARAM_STR);

        $stmt->execute();
        $mainCount=$stmt->rowCount();
        $userData = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($userData))
        {
            $user_id=$userData->id_cliente;
            $userData->token = apiToken($user_id);
        }
        
        $db = null;
         if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Bad request"}}';
            }

           
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}




















   
