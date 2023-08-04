<?php
  include_once('../includes/database.php');

  /**
   * Verifies if a certain username, password combination
   * exists in the database. Use the sha1 hashing function.
   */
  function checkUserPassword($username, $password) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return $user !== false && password_verify($password, $user['password']);
  }

  function insertUser($auxusername, $password) {
    $db = Database::instance()->db();
    $username = strip_tags($auxusername);
    $options = ['cost' => 12];

    $stmt = $db->prepare('INSERT INTO user VALUES(?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL)');
    $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT, $options)));
  }

  function getUser($name) {
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM user INNER JOIN images on user.profilepicID = images.id WHERE username = ?");
    $stmt->execute(array($name));  
    return $stmt->fetchAll();
  }

  function updateUser($auxusername, $auxfirstname, $auxlastname, $gender, $auxphonenumber, $auxaboutme, $auxcity, $id) {
    $db = Database::instance()->db();
    $username = strip_tags($auxusername);
    $firstname = strip_tags($auxfirstname);
    $lastname = strip_tags($auxlastname);
    $phonenumber = strip_tags($auxphonenumber);
    $aboutme = strip_tags($auxaboutme);
    $city = strip_tags($auxcity);
    $stmt = $db->prepare('UPDATE user SET firstname = ?, lastname = ?, gender = ?, phonenumber = ?, aboutme = ?, city = ?, profilepicId = ? WHERE username = ?');
    $stmt->execute(array($firstname, $lastname, $gender, $phonenumber, $aboutme, $city, $id, $username));
  }

  function updateSecurity($olduser, $anewuser, $newpass){
    $db = Database::instance()->db();
    $newuser = strip_tags($anewuser);
    if($newpass === ""){
        $stmt = $db->prepare('UPDATE user SET username = ? WHERE username = ?');
        $stmt->execute(array($newuser, $olduser));
    }
    else{
        $options = ['cost' => 12];
        
        $stmt = $db->prepare('UPDATE user SET username = ?, password = ? WHERE username = ?');
        $stmt->execute(array($newuser, password_hash($newpass, PASSWORD_DEFAULT, $options), $olduser));
    }
  }

  function userApply($username, $animalid) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO userApplied VALUES(NULL, ?, ?)');
    $stmt->execute(array($username, $animalid));

    $stmt2 = $db->prepare('INSERT INTO applynotifications VALUES(NULL, ?, ?)');
    $stmt2->execute(array($username, $animalid));
  }

  function userUnapply($username, $animalid) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM userApplied WHERE id_user = ? AND id_animal = ?');
    $stmt->execute(array($username, $animalid));

    $stmt2 = $db->prepare('INSERT INTO unapplynotifications VALUES(NULL, ?, ?)');
    $stmt2->execute(array($username, $animalid));
  }

  function userFav($username, $animalid) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO userFav VALUES(NULL, ?, ?)');
    $stmt->execute(array($username, $animalid));
  }

  function userUnfav($username, $animalid) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM userFav WHERE id_user = ? AND id_animal = ?');
    $stmt->execute(array($username, $animalid));
  }

  function giveUserPet($currentusername, $newusername, $animalid) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT * FROM animal WHERE animal_id = '$animalid'");
    $stmt->execute();  
    $animal = $stmt->fetchAll();

    $stmt2 = $db->prepare("SELECT * FROM user WHERE username = '$newusername'");
    $stmt2->execute();  
    $user = $stmt2->fetchAll();
    
    $newcity = $user[0]['city'];

    $stmt3 = $db->prepare("UPDATE animal SET location = '$newcity', newowner= '$newusername', adopted='true' WHERE animal_id = '$animalid'");
    $stmt3->execute();

    $stmt4 = $db->prepare("DELETE FROM userApplied WHERE id_animal='$animalid'");
    $stmt4->execute();

    $stmt5 = $db->prepare('INSERT INTO adoptionnotifications VALUES (NULL, ?,?,?)');
    $stmt5->execute(array($newusername, $currentusername, $animalid));
  }

  function getOwner($username) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT * from user INNER JOIN images on profilepicID = id WHERE username = ?");
    $stmt->execute(array($username));  
    $user = $stmt->fetchAll();

    return $user[0];
  }

  function getNotificationMessage($type, $formerowner, $animal_name, $user_id) {
    if ($type == 'comment')
      return $formerowner." commented on ".$animal_name.". Go check it out!";
    if ($type == 'adoption')
      return $formerowner." gave you ".$animal_name.". Congratulations!";
  }

  function checkNewNotifications($username) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT * from adoptionnotifications WHERE user_id = ?");
    $stmt->execute(array($username));  
    $notitifications = $stmt->fetchAll();

    if (!empty($notitifications)){
      return true;
    }

    $stmt = $db->prepare("SELECT * from commentnotifications WHERE commentnotifications.owner = ?");
    $stmt->execute(array($username));  
    $notitifications = $stmt->fetchAll();

    if (!empty($notitifications)){
      return true;
    }

    $stmt = $db->prepare("SELECT * FROM applynotifications INNER JOIN animal ON applynotifications.animal_id = animal.animal_id WHERE animal.owner = ?");
    $stmt->execute(array($username));  
    $notitifications = $stmt->fetchAll();

    if (!empty($notitifications)){
      return true;
    }

    $stmt = $db->prepare("SELECT * FROM unapplynotifications INNER JOIN animal ON unapplynotifications.animal_id = animal.animal_id WHERE animal.owner = ?");
    $stmt->execute(array($username));  
    $notitifications = $stmt->fetchAll();

    if (!empty($notitifications)){
      return true;
    }

    return false;
  }

  function getAdoptionNotifications($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM adoptionnotifications INNER JOIN animal ON adoptionnotifications.animal_id = animal.animal_id INNER JOIN images ON animal.image = images.id WHERE adoptionnotifications.user_id=? ');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  function getCommentNotifications($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM commentnotifications INNER JOIN animal ON commentnotifications.animal_id = animal.animal_id INNER JOIN images ON animal.image = images.id WHERE commentnotifications.owner=? AND commentnotifications.user_id != commentnotifications.owner');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }
  
  function getApplyNotifications($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * from applynotifications INNER JOIN animal on animal.animal_id = applynotifications.animal_id INNER JOIN images ON animal.image = images.id WHERE animal.owner = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  function getUnapplyNotifications($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * from unapplynotifications INNER JOIN animal on animal.animal_id = unapplynotifications.animal_id INNER JOIN images ON animal.image = images.id WHERE animal.owner = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  function deleteNotifications($id, $applynotifications, $unapplynotifications) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM adoptionnotifications WHERE adoptionnotifications.user_id=?');
    $stmt->execute(array($id));

    $stmt = $db->prepare('DELETE FROM commentnotifications WHERE commentnotifications.owner=?');
    $stmt->execute(array($id));
    

    if (!empty($applynotifications)){
      $stmt = $db->prepare('DELETE FROM applynotifications WHERE applynotifications.animal_id=?');
      $stmt->execute(array($applynotifications[0]['animal_id']));
    }

    if (!empty($unapplynotifications)){
      $stmt = $db->prepare('DELETE FROM unapplynotifications WHERE unapplynotifications.animal_id=?');
      $stmt->execute(array($unapplynotifications[0]['animal_id']));
    }
  }
  
?>