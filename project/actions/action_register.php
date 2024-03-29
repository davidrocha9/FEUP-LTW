<?php
  include_once('../includes/session.php');  
  include_once('../database/db_user.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm = $_POST['confirmpassword'];

  // Don't allow certain characters
    if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/login.php'));
  }

  if ($password != $confirm){
    die(header('Location: ../pages/login.php'));
  }

  try {
    insertUser($username, $password);
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
    header('Location: ../pages/finalizelogin.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
?>