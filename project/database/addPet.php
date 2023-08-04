<?php
    //file_uploads = On

    print_r($_FILES);
    

    $dbh = new PDO('sqlite:../database/shelter.db');
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //images
    
    $stmt = $dbh->prepare("INSERT INTO images VALUES(NULL, ?)");
    
    $target_file_aux = basename($_FILES['fileToUpload']['name']);
    //echo $target_file_aux . " \n";
    $imageFileType = strtolower(pathinfo($target_file_aux, PATHINFO_EXTENSION));
    $uploadOk = 1;
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
        echo "Sorry, only jpg, jpeg, png and gif files are allowed \n";
        $uploadOk = 0;
    }
    
    if($_FILES['fileToUpload']['size'] > 500000){
        echo "Sorry, the file is too large \n";
        $uploadOk = 0;
    }
    
    $stmt->execute(array($target_file_aux));
    $imagesID = $dbh->lastInsertId();

    $target_file = "../assets/" . $imagesID . "." . $imageFileType;

    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);

    $stmt2 = $dbh->prepare("INSERT INTO factCheck VALUES(NULL, ?, ?, ?, ?, ?)");
    $stmt2->execute(array($_POST["chip"], $_POST["trained"], $_POST["purebred"], $_POST["kids"], $_POST["special_needs"]));
    $factID = $dbh->lastInsertId();

    $name = $_SESSION['username'];
     
    $stmtAux = $db->prepare("SELECT * FROM user WHERE username = '$name'");
    $stmtAux->execute();
    $user = $stmtAux->fetchAll();


    //echo "aqui caralho \n";
    $stmt3 = $dbh->prepare("INSERT INTO animal VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    //echo $_POST["reasons"];
    $stmt3->execute(array($_POST["pet_name"], $_POST["pet_type"], $_POST["pet_breed"], $_POST["age"], $_POST["gender"], $_POST["size"], $_POST["spayed_neutered"], $user[0]['city'],$_POST["reasons"], $_POST["keep_time"], $_POST["story"], $imagesID, $user[0]['username'],$factID));
    $animalID = $dbh->lastInsertId();
    

    header("Location: rehomeapet_faq_final.php");
?>