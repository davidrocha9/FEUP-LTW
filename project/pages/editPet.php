<?php
  include_once('../templates/tpl_common.php');
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../templates/tpl_editpet.php');
  include_once('../database/animals.php');
  include_once('../database/db_user.php');
  include_once('../includes/header.php');

  $name = $_SESSION['username'];
  $animal_id = $_GET['animal_id'];  

  $user = getUser($name);
  $animal = getAnimalById($animal_id);

  draw_editpet($user, $animal);
?>