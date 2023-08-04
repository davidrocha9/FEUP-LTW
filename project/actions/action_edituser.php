<?php
  include_once('../includes/session.php');  
  include_once('../database/db_user.php');
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $phonenumber = $_POST['phonenumber'];
  $aboutme = $_POST['aboutme'];
  $city = $_POST['city'];
  $username = $_SESSION['username'];

  $dbh = new PDO('sqlite:../database/shelter.db');
  $stmt = $dbh->prepare("SELECT * FROM user INNER JOIN images ON user.profilepicId = images.id WHERE username = '$username'");
  $stmt->execute();  
  $user = $stmt->fetchAll();

  $token = $_POST['token'];
  if($token !== $_SESSION['csrf']){
    die(header("Location: ../pages/frontpage.php"));
  }

  // Don't allow certain characters
    if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/login.php'));
  }

  try {
    updateUser($username, $firstname, $lastname, $gender, $phonenumber, $aboutme, $city, $user[0]['id']);
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
    header('Location: ../pages/profilepage.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
?>