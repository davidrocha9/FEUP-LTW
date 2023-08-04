<?php
include_once("../includes/connection.php");

function getCommentsById($idPost) {
    $db = Database::instance()->db(); //get db singleton variable
    $stmt = $db->prepare('SELECT * FROM Comments INNER JOIN Users on Comments.idUser = Users.idUser WHERE idPost = ?');
    $stmt->execute(array($idPost));
    return $stmt->fetchAll();
}

function addComment($idUser, $idPost, $auxtext) {
    $db = Database::instance()->db(); //get db singleton variable
    $text = strip_tags($auxtext);
    $stmt = $db->prepare('INSERT INTO comments (idUser, idPost, text) VALUES (?,?,?)');
    $stmt->execute(array($idUser, $idPost, $text));
    return $stmt->fetchAll();
}

function getCommentsAfterLastId($idComment, $idPost) {
    $db = Database::instance()->db(); //get db singleton variable
    $stmt = $db->prepare('SELECT * FROM Comments INNER JOIN Users on Comments.idUser = Users.idUser WHERE idPost = ? AND idComment > ?');
    $stmt->execute(array($idPost,$idComment));
    return $stmt->fetchAll();
}

function getLastCommmentId(){
    $db = Database::instance()->db(); //get db singleton variable
    $stmt = $db->prepare('SELECT *, max(idComment) as max from Comments');
    $stmt->execute(array());
    return $stmt->fetch();
}

?>