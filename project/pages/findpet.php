<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../templates/tpl_findpet.php');
  include_once('../database/animals.php');
  include_once('../includes/header.php');

  $location = $_GET['location'];
  $breed = $_GET['breed'];
  $gender = $_GET['gender'];
  $age = $_GET['age'];

  $page = $_GET['page'];
  $floor = 8 * ($page-1) + 1;
  $ceiling = $floor + 8;
  $nextpage = $page + 1;
  $previouspage = $page - 1;
  $forward = "findpet.php?page=".$nextpage."&location=".$location."&breed=".$breed."&gender=".$gender."&age=".$age;
  $back = "findpet.php?page=".$previouspage."&location=".$location."&breed=".$breed."&gender=".$gender."&age=".$age;
  
  $animals = getFindPetAnimals($floor, $location, $breed, $gender, $age);
  $totalanimals = getAllFilteredAnimals($floor, $location, $breed, $gender, $age);

  draw_findpet($animals, $totalanimals, $forward, $back, $page);
?>