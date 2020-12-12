<?php
session_start();
error_reporting(0);

require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
   header('location: ../cliente/menbresia');
}


require_once '../php/class/client.php';
$c = new Client();
$d = $c->get_data_by_id($_SESSION['user']);
$country_byid = $c->get_countries_by_idcountry($d[0]['pais']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil</title>
    <?php require_once 'includes/head.php'; ?>
</head>

<body>
    <div class="container-total active">
        <?php require_once 'includes/sidebar-left.php'; ?>
        <div class="content-dash">
            <?php require_once 'includes/header-top.php'; ?>
            <div class="container-total_profile-config_ttrq">
                <!--------------->
                <div class="content-profile">
                    <div class="content-title-profile">
                        <h1 class="title-dashboard lang_ttrq" key="title-form-1-cli-dp-ad_cli">Mi perfil</h1>
                    </div>
                    <form id="form-perfilcliente" method="POST" ectype="multipart/form-data">
                        <input type="hidden" name="id_cli" value="<?php echo $d[0]['id_cliente']; ?>"></input>
                        <!-- INFORMACIÓN BÁSICA -->
                        <div class="profile-content">
                            <div class="profile-head lang_ttrq" key="subtitle-form-1-cli-dp-ad_cli">Información Básica
                            </div>
                            <div class="form-content-profile">
                                <div class="profile-controls">
                                    <label for="" class="label-profile lang_ttrq" key="txt-form-1-cli-dp-ad_cli-1">Tu
                                        nombre</label>
                                    <input type="text" name="name_cli" class="input-profile"
                                        value="<?php echo $d[0]['nombre_cliente']  ?>">
                                </div>
                                <div class="profile-controls">
                                    <label for="" class="label-profile lang_ttrq" key="txt-form-1-cli-dp-ad_cli-1">Tu
                                        nombre</label>
                                    <input type="text" name="lastaname_cli" class="input-profile"
                                        value="<?php echo  $d[0]['apellido_cliente']; ?>">
                                </div>
                                <div class="profile-controls">
                                    <label for="" class="label-profile lang_ttrq" key="txt-form-1-cli-dp-ad_cli-2">Tu
                                        correo electrónico</label>
                                    <input type="text" class="input-profile" name="email"
                                        value="<?php echo $d[0]['email_cliente']; ?>">
                                </div>
                                <!-- <div class="profile-controls">
                                  <label for="" class="label-profile">Tu contraseña</label>
                                  <input type="text" name="pass_cli" class="input-profile" value="">
                              </div>
                              <div class="profile-controls">
                                  <label for="" class="label-profile">Confirmar contraseña</label>
                                  <input type="text" name="pass_cli1" class="input-profile" value="">
                              </div> -->
                            </div>
                        </div>
                        <!-- DATOS DE ENVÍO -->
                        <div class="profile-content">
                            <div class="profile-head lang_ttrq" key="subtitle-form-2-cli-dp-ad_cli">Datos de envío</div>
                            <div class="form-content-profile">

                                <div class="profile-controls">
                                    <label for="" class="label-profile lang_ttrq"
                                        key="txt-form-2-cli-de-ad_cli-1">País</label>
                                    <select name="country_cli" class="input-profile">
                                        <option value="<?php echo $d[0]['pais']; ?>" selected>
                                            <?php echo $d[0]['nombre_pais']; ?></option>
                                        <?php 
                                            foreach ($country_byid as $value) {
                                                echo "<option value='{$value["id_pais"]}'>{$value["nombre_pais"]}</option>";
                                            }
                                         ?>
                                    </select>
                                </div>
                                <div class="profile-controls">
                                    <label for="" class="label-profile lang_ttrq"
                                        key="txt-form-2-cli-de-ad_cli-2">Dirección</label>
                                    <input type="text" name="city_cli" class="input-profile"
                                        value="<?php echo $d[0]['direccion_cliente']; ?>">
                                </div>

                                <div class="profile-controls">
                                    <label for="" class="label-profile lang_ttrq"
                                        key="txt-form-2-cli-de-ad_cli-3">Teléfono</label>
                                    <input type="text" name="telephone_cli" class="input-profile"
                                        value="<?php echo $d[0]['telefono']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="profile-controls-submit">
                            <button type="submit" class="btn-submit-profile lang_ttrq" key="btn-updt-cli-form-1-ad_cli"
                                id="btn-update-perfilcliente">Actualizar</button>
                        </div>
                    </form>
                </div>
                <!--------------->
                <!--------------->
                <div class="content-store-config">
                    <div class="content-title-store-config">
                        <h1 class="title-dashboard lang_ttrq" key="title-form-3-cli-dp-ad_cli">Mi Tienda</h1>
                    </div>
                    <form action="" method="POST" ectype="multipart/form-data">
                        <!-- INFORMACIÓN BÁSICA -->
                        <input type="hidden" id="tienda" name="tienda" value="<?php echo $d[0]['tienda']; ?>">
                        <div class="store-config-content">
                            <div class="store-config-head lang_ttrq" key="subtitle-form-3-cli-ad_cli">Información Básica
                            </div>
                            <div class="form-content-store-config">
                                <div class="store-config-controls-img">
                                    <label for="" class="label-store-config-img lang_ttrq"
                                        key="txt-form-3-cli-ad_cli-1">Logo</label>
                                    <input type="file" name="logo" id="logo-store"
                                        class="input-store-config-img logo-store">
                                    <div class="container-upd-logo-store_ttrq">
                                        <div class="content-upd-logo-store_ttrq">
                                            <div
                                                style="background-image: url(./images/store/<?php echo $d[0]['logo']; ?>);background-repeat:no-repeat;background-size: contain;background-position: center;">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="logo" id="logostr">
                                </div>
                            </div>
                        </div>
                        <div class="store-config-controls-submit">
                            <button type="submit" id="btn_update-store" class="btn-submit-store-config lang_ttrq"
                                key="btn-updt-cli-form-2-ad_cli">Actualizar</button>
                        </div>
                    </form>
                </div>
                <!--------->
            </div>
        </div>
    </div>
    <script src="js/customs.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/update_store.js"></script>
    <script src="js/profile-client.js"></script>
</body>

</html>