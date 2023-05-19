<?php
session_start();
if(isset($_SESSION["adm-logg_ttrueque"])){
  header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php';?>
  <title>Trueque | Login Admin</title>
</head>
<body class="c_body-loginAdm">

  <div class="cLoggAdm">
    <div id="cMessage-user"></div>
    <div class="cLoggAdm__c">
      <div class="cLoggAdm__c__fLogg box-small">
        <div class="cLoggAdm__c__fLogg__cLogo">
          <img src="<?= $url;?>assets/img/logos/Logo_TTRK.png" alt="logoLogin_Ttrueque" width="100" height="100" decoding="async">
        </div>
        <div class="cLoggAdm__c__fLogg__cTitle">
          <h2 class="cLoggAdm__c__fLogg__cTitle--title">INICIAR SESIÓN</h2>
        </div>
        <form method="POST" class="cLoggAdm__c__fLogg__frm" id="logg-cPlatformAdm">
          <div class="cLoggAdm__c__fLogg__frm__cCtrls bx-classic">
            <div class="cLoggAdm__c__fLogg__frm__cCtrls__cIcon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cLoggAdm__c__fLogg__frm__cCtrls__cIcon--email"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/></svg>
            </div>
            <?php
              $tmp_email = "";
              if(count($_COOKIE) > 0){
                if(isset($_COOKIE['ttrueque_adm-email'])){
                  $tmp_email = "<input type='email' name='email-adm' id='email-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--input_chkset' placeholder='Correo electrónico' maxlength='200' required autocomplete='on' spellcheck='false' value='". json_decode($_COOKIE['ttrueque_adm-email'], true) ."'>";
                }else{
                  $tmp_email = "<input type='email' name='email-adm' id='email-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--input' placeholder='Correo electrónico' maxlength='200' required autocomplete='on' spellcheck='false'>";
                }
              }else{
                $tmp_email = "<input type='email' name='email-adm' id='email-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--input' placeholder='Correo electrónico' maxlength='200' required autocomplete='on' spellcheck='false'>";
              }
              echo $tmp_email;
            ?>
          </div>
          <div class="cLoggAdm__c__fLogg__frm__cCtrls bx-classic">
            <div class="cLoggAdm__c__fLogg__frm__cCtrls__cIcon" id="icon-showPassAdm">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cLoggAdm__c__fLogg__frm__cCtrls__cIcon--pass"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z"/></svg>
            </div>
            <?php
              $tmp_pass = "";
              if(count($_COOKIE) > 0){
                if(isset($_COOKIE['ttrueque_adm-password'])){
                  $tmp_pass = "<input type='password' name='pass-adm' id='pass-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--input_chkset' placeholder='Contraseña' maxlength='200' required autocomplete='off' spellcheck='false' value='". json_decode($_COOKIE['ttrueque_adm-password'], true) ."'>";
                }else{
                  $tmp_pass = "<input type='password' name='pass-adm' id='pass-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--input' placeholder='Contraseña' maxlength='200' required autocomplete='off' spellcheck='false'>";
                }
              }else{
                $tmp_pass = "<input type='password' name='pass-adm' id='pass-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--input' placeholder='Contraseña' maxlength='200' required autocomplete='off' spellcheck='false'>";
              }
              echo $tmp_pass;
            ?>
          </div>
          <?php
            /*
            $tmp_chkrempass = "";
            if(count($_COOKIE) > 0){
              if(isset($_COOKIE['ttrueque_adm-email']) && isset($_COOKIE['ttrueque_adm-password'])){
                $tmp_chkrempass = "";
              }else{
                $tmp_chkrempass = "
                  <div class='cLoggAdm__c__fLogg__frm__cCtrls flx-justify-end'>
                    <div class='cLoggAdm__c__fLogg__frm__cCtrls--cSpanText'>
                      <span>Recordar contraseña</span>
                    </div>
                    <div class='cLoggAdm__c__fLogg__frm__cCtrls--cIptChk'>
                      <input type='checkbox' name='remem-pass-adm' id='remem-pass-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--cIptChk--input' placeholder='Recordar contraseña'>                     
                      <label for='remem-pass-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--cIptChk--cLabeltext'>
                      </label>
                    </div>
                  </div>
                ";
              }
            }else{
              $tmp_chkrempass = "
                <div class='cLoggAdm__c__fLogg__frm__cCtrls flx-justify-end'>
                  <div class='cLoggAdm__c__fLogg__frm__cCtrls--cSpanText'>
                    <span>Recordar contraseña</span>
                  </div>
                  <div class='cLoggAdm__c__fLogg__frm__cCtrls--cIptChk'>
                    <input type='checkbox' name='remem-pass-adm' id='remem-pass-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--cIptChk--input' placeholder='Recordar contraseña'>                     
                    <label for='remem-pass-adm' class='cLoggAdm__c__fLogg__frm__cCtrls--cIptChk--cLabeltext'>
                    </label>
                  </div>
                </div>
              ";
            }
            echo $tmp_chkrempass;
            */
          ?>
          <div class="cLoggAdm__c__fLogg__frm--cBtnsActions">
            <!-- <a href="javascript:void(0);" class="cLoggAdm__c__fLogg__frm--cBtnsActions--recovPass">¿Olvidaste tu contraseña?</a> -->
            <button class="cLoggAdm__c__fLogg__frm--cBtnsActions--btnLogin" type="submit">Ingresar</button>
          </div>
        </form>
        <div class="cLoggAdm__c__fLogg--cBottInfo">
          <small class="cLoggAdm__c__fLogg--cBottInfo--desc">
            <span>©</span>
            <span>2021 - <?= date("Y");?></span>
            <span>&nbsp;-&nbsp;</span>
            <span>Versión 1.0</span>
          </small>
        </div>
      </div>
      <div class="cLoggAdm__c--imgbanner">
        <div class="img-backdrop-dark"></div>
        <img src="<?= $url; ?>assets/img/utilities/wallpaper_ttrueque-login.jpg" alt="banner_login-adm" width="100" height="100">
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?= $url;?>js/actions/adm-login.js"></script>
</body>
</html>