<?php
  include_once('../includes/session.php');  
  include_once('../database/db_user.php');
  $newusername = $_POST['username'];
  $oldpwd = $_POST['oldpass'];
  $newpwd = $_POST['newpass'];
  $cnewpwd = $_POST['confirmnewpass'];
  $oldusername = $_SESSION['username'];

  $token = $_POST['token'];
  if($token !== $_SESSION['csrf']){
    die(header("Location: ../pages/frontpage.php"));
  }

  // Don't allow certain characters
    if ( !preg_match ("/^[a-zA-Z0-9]+$/", $newusername)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/editprofile.php'));
  }
  if(!($oldpwd === "" & $newpwd === "" & $cnewpwd === "")){
  // Check old password
    if(!checkUserPassword($oldusername, $oldpwd)){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Old password does not match!');
        die(header('Location: ../pages/editprofile.php'));
    }

    // Check password confirmation
    if(!($newpwd === $cnewpwd)){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'New password does not match the confirmation!');
        die(header('Location: ../pages/editprofile.php'));
    }
  }

  try {
    updateSecurity($oldusername, $newusername, $newpwd);
    $anusername = strip_tags($newusername);
    $_SESSION['username'] = $anusername;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Changed information sucessfully!');
    header('Location: ../pages/profilepage.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to change information!');
    header('Location: ../pages/editprofile.php');
  }
?>