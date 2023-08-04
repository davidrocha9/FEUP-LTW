<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  // Database connection

  // Database connection
  $dbh = new PDO('sqlite:../database/shelter.db');
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
  $stmt->execute(array(""));
  
  // Get image ID
  $id = $dbh->lastInsertId();

  $target_dir = "../database/images/originals/";
  $target_file = $target_dir.basename($id);
  $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
  $file = $target_file.basename(".".$imageFileType);
  
  $stmt2 = $dbh->prepare("UPDATE images SET title = ? WHERE id = $id");
  $stmt2->execute(array($file));

  $target_dir = "images/originals/";
  $target_file = $target_dir.basename($id);
  $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
  $file = $target_file.basename(".".$imageFileType);

  // Insert image data into database
  // Move the uploaded file to its final destination
  move_uploaded_file($_FILES['image']['tmp_name'], $file);
  
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $phonenumber = $_POST['phonenumber'];
  $aboutme = $_POST['aboutme'];
  $city = $_POST['city'];
  $username = $_SESSION['username'];

  // Don't allow certain characters
    if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/login.php'));
  }

  try {
    updateUser($username, $firstname, $lastname, $gender, $phonenumber, $aboutme, $city, $id);
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
    header('Location: ../pages/frontpage.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
?>
