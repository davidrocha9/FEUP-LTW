<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../templates/tpl_rehome.php');
  include_once('../includes/header.php');

  if(isset($_SESSION['username']) == '')
    header('Location: ../pages/login.php');

  draw_rehome_faq();  
?>

