<?php
  session_start(); 
  unset($_SESSION['user_admin']);
  header("location:./"); 
?>