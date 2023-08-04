<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $animalid = $_GET['animal_id'];
  $currentusername = $_SESSION['username'];
  $newusername = $_GET['user_id'];

  try {
    giveUserPet($currentusername, $newusername, $animalid);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Applied!');
    header('Location: ../pages/frontpage.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to apply!');
    header('Location: ../pages/login.php');
  }

?>