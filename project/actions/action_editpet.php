<?php
    include_once('../includes/session.php');
    include_once('../database/db_user.php');

     // Database connection
    $dbh = new PDO('sqlite:../database/shelter.db');
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $animalID = $_POST["animal_id"];
    $factCheckId = $_POST["factcheck_id"];
    $token = $_POST['token'];
    if($token !== $_SESSION['csrf']){
        die(header("Location: ../pages/frontpage.php"));
    }
    $imageFileType = strtolower(pathinfo($_FILES["img_name"]["name"], PATHINFO_EXTENSION));

    if ($imageFileType != ""){
        $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
        $stmt->execute(array(""));
    }

    // Get image ID
    $image_id = $dbh->lastInsertId();

    $target_dir = "../database/images/originals/";
    $target_file = $target_dir.basename($image_id);
    $file = $target_file.basename(".".$imageFileType);

    $petneeds = strip_tags($_POST["special_needs"]);

    if ($imageFileType != ""){
        $stmt4 = $dbh->prepare("UPDATE images SET title = ? WHERE id = $image_id");
        $stmt4->execute(array($file));

        // Insert image data into database
        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['img_name']['tmp_name'], $file);
    }

    $stmt1 = $dbh->prepare("UPDATE factCheck SET chip=?, trained=?, purebred=?, kids=?, specialNeeds=? where id=?");
    $stmt1->execute(array($_POST["chip"], $_POST["trained"], $_POST["purebred"], $_POST["kids"], $petneeds, $factCheckId));

    $username = $_SESSION['username'];
    $stmt2 = $dbh->prepare("SELECT * FROM user WHERE username = '$username'");
    $stmt2->execute();  
    $user = $stmt2->fetchAll();

    $stmt3 = $dbh->prepare("UPDATE animal SET animal_name=?, species=?, breed=?, age=?, gender=?, size=?, spayed_neutered=?, story=?, reasons=?, keep_time=? where animal_id=?");
    $petname = strip_tags($_POST["pet_name"]);
    $petstory = strip_tags($_POST["story"]);
    $stmt3->execute(array($petname, $_POST["pet_type"], $_POST["pet_breed"],  $_POST["age"], $_POST["gender"], $_POST["size"], $_POST["spayed_neutered"], $petstory, $_POST["reasons"], $_POST["keep_time"], $animalID));
    
    if ($imageFileType != ""){
        $stmt3 = $dbh->prepare("UPDATE animal SET image=? where animal_id=?");
    
    $stmt3->execute(array($image_id, $animalID));
    }

    header("Location: ../pages/animalsdetails.php?animal_id=".$animalID);

?>