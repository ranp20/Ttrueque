<?php
  session_start(); 
  unset($_SESSION["adm-logg_ttrueque"]);
  header("location:./"); 
?>