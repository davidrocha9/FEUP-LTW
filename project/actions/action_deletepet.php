<?php
  include_once('../includes/session.php');
  include_once('../database/animals.php');

  $animalid = $_GET['animal_id'];
  $currentusername = $_SESSION['username'];

  try {
    deletePet($animalid);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Pet Deleted!');
    header('Location: ../pages/frontpage.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to delete!');
    header('Location: ../pages/frontpage.php');
  }

?>