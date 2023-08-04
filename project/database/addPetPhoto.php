<?php 
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

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
  $imageFileType = strtolower(pathinfo($_FILES["img_name"]["name"], PATHINFO_EXTENSION));
  $file = $target_file.basename(".".$imageFileType);
  
  $stmt2 = $dbh->prepare("UPDATE images SET title = ? WHERE id = $id");
  $stmt2->execute(array($file));

  $target_dir = "images/originals/";
  $target_file = $target_dir.basename($id);
  $imageFileType = strtolower(pathinfo($_FILES["img_name"]["name"], PATHINFO_EXTENSION));
  $file = $target_file.basename(".".$imageFileType);

  // Insert image data into database
  // Move the uploaded file to its final destination
  move_uploaded_file($_FILES['img_name']['tmp_name'], $file);

  try {
    $stmt4 = $dbh->prepare("INSERT INTO factCheck VALUES(NULL, ?, ?, ?, ?, ?)");
    $stmt4->execute(array($_POST["chip"], $_POST["trained"], $_POST["purebred"], $_POST["kids"], $_POST["special_needs"]));
    $factID = $dbh->lastInsertId();

    $username = $_SESSION['username'];
    $stmt2 = $dbh->prepare("SELECT * FROM user WHERE username = '$username'");
    $stmt2->execute();  
    $user = $stmt2->fetchAll();
    $petname = strip_tags($_POST["pet_name"]);
    $petstory = strip_tags($_POST["story"]);
    $stmt3 = $dbh->prepare("INSERT INTO animal VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt3->execute(array($petname, $_POST["pet_type"], $_POST["pet_breed"],  $_POST["age"], $_POST["gender"], $_POST["size"], $_POST["spayed_neutered"], $user[0]['city'], $_POST["reasons"], $_POST["keep_time"], $petstory, $id, $_SESSION['username'], "false", NULL, $factID));
    $animalID = $dbh->lastInsertId();
    header("Location: ../pages/rehomeapet_faq_final.php");
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add pet!');
    header('Location: rehomeapet_faq.php');
  }
?>

