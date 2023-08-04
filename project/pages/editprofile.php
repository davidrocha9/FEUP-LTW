<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../templates/tpl_editprofile.php');
  include_once('../includes/header.php');
  include_once('../database/db_user.php');
  
  $name = $_SESSION['username'];

  $user = getUser($name);
  $path = $user[0]['title'];

  draw_editprofile($user, $path);
?>