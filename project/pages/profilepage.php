<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../templates/tpl_profile.php');
  include_once('../includes/header.php');
  include_once('../database/db_user.php');
  include_once('../database/animals.php');

  $db = new PDO('sqlite:../database/shelter.db');
  
  $name = $_SESSION['username'];

  $user = getUser($name);
  $path = $user[0]['title'];

  $animals = getMyPets($user[0]['username']);
  $favanimals = getMyFavPets($user[0]['username']);
  $appliedanimals = getMyAppliedPets($user[0]['username']);
  $adoptedanimals = getMyAdoptedPets($user[0]['username']);

  draw_profile($animals, $favanimals, $appliedanimals, $adoptedanimals, $user, $path);
?>