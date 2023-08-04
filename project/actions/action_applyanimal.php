<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $animalid = $_GET['animalid'];
  $username = $_SESSION['username'];
     
  try {
    userApply($username, $animalid);
    $_SESSION['success_messages'][] = 'Applied!';
    header('Location: ../pages/animalsdetails.php?animal_id='.$animalid);
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['error_messages'][] = 'Failed to apply!';
    header('Location: ../pages/login.php');
  }

?>