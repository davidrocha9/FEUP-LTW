<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $animalid = $_GET['animalid'];
  $username = $_SESSION['username'];
     
  try {
    userUnfav($username, $animalid);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Unfavorited!');
    header('Location: ../pages/animalsdetails.php?animal_id='.$animalid);
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to unfavorited!');
    header('Location: ../pages/login.php');
  }

?>