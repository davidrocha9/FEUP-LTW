<?php
    include_once("../includes/session.php");
    include_once("../database/db_comments.php");

    //get values
    if (!isset($_POST['username'])||!isset($_POST['animalID'])||!isset($_POST['comment'])||!isset($_POST['lastcommentID'])||!isset($_POST['animalID']))
        die("No values");
    
    $db = new PDO('sqlite:../database/shelter.db');
    $stmt = $db->prepare('SELECT * FROM animal WHERE animal_id=?');
    $stmt->execute(array($_POST['animalID']));  
    $owner = $stmt->fetchAll();

    addComment($_POST['commentID'], $_POST['animalID'], $_POST['username'], $_POST['comment'], $owner[0]['owner']);  
    $comments = getCommentsAfterLastID($_POST['lastcommentID'], $_POST['animalID']);
    
    echo(json_encode($comments));

?>