<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../templates/tpl_frontpage.php');
  include_once('../database/animals.php');
  include_once('../includes/header.php');

  $animals = get4Pets();
  $numberanimals = getfrontPageNrAnimals();
  $link = "";

  draw_frontpage($link, $animals, $numberanimals);
?>  