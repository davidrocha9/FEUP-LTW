<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../includes/header.php');
  include_once('../database/db_user.php');
  include_once('../database/animals.php');
  include_once('../templates/tpl_favAndApplied.php');
  include_once('../templates/tpl_comments.php');
  include_once('../templates/tpl_animalsdetails.php');

  $id = $_GET['animal_id'];

  $animals = getAnimalById($id);
  $owner = getOwner($animals[0]['owner']);  
  $comments = getAnimalComments($id);  

  draw_animalsdetails($id, $animals, $owner, $comments);
?>