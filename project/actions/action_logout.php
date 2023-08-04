<?php
  include_once('../includes/session.php');
  
  session_destroy();
  session_start();

  $_SESSION['error_messages'][] = 'Logged out!';

  header('Location: ../pages/frontpage.php');
?>