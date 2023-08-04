<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $username = $_POST['username'];
  $password = $_POST['password'];
     
  if (checkUserPassword($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['success_messages'][] = 'Logged in successfully!';
    header('Location: ../pages/frontpage.php');
  } else {
    $_SESSION['error_messages'][] = 'Login failed!';
    header('Location: ../pages/login.php');
  }

?>