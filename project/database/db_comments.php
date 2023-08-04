<?php
include_once("connection.php");

function getCommentsById($idPost) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Comments INNER JOIN Users on Comments.idUser = Users.idUser WHERE idPost = ?');
    $stmt->execute(array($idPost));
    return $stmt->fetchAll();
}

function addComment($commentID, $animalID, $username, $auxtext, $currentuser) {
    global $db;
    $text = strip_tags($auxtext);
    $stmt2 = $db->prepare('INSERT INTO commentnotifications VALUES (NULL,?,?,?)');
    $stmt2->execute(array($username, $currentuser, $animalID));

    $stmt = $db->prepare('INSERT INTO comments VALUES (?,?,?,?)');
    $stmt->execute(array($commentID, $animalID, $username, $text));
    return $stmt->fetchAll();
}

function getCommentsAfterLastId($idComment, $idPost) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Comments INNER JOIN user on Comments.username = User.username INNER JOIN images on Images.id = User.profilepicID WHERE animal_id = ? AND Comments.id > ?');
    $stmt->execute(array($idPost,$idComment));
    return $stmt->fetchAll();
}

function getLastCommmentId(){
    global $db;
    $stmt = $db->prepare('SELECT *, max(idComment) as max from Comments');
    $stmt->execute(array());
    return $stmt->fetch();
}

?>