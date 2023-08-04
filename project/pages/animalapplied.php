<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../templates/tpl_animalapplied.php');
  include_once('../includes/header.php');
  include_once('../database/db_user.php');
  include_once('../database/animals.php');

  $id = $_GET['animalid'];

  $animals = getAnimalById($id);
  $users = getUsersWhoAppliedForAnimal($id);

  draw_animalapplied($animals, $users);  
?>