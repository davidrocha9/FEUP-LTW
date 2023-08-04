<?php
  include_once('../includes/database.php');

  function deletePet($animal_id){
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM adoptionnotifications WHERE animal_id = ?');
    $stmt->execute(array($animal_id)); 
    
    $stmt = $db->prepare('DELETE FROM applynotifications WHERE animal_id = ?');
    $stmt->execute(array($animal_id)); 

    $stmt = $db->prepare('DELETE FROM commentnotifications WHERE animal_id = ?');
    $stmt->execute(array($animal_id)); 

    $stmt = $db->prepare('DELETE FROM unapplynotifications WHERE animal_id = ?');
    $stmt->execute(array($animal_id)); 

    $stmt = $db->prepare('DELETE FROM comments WHERE animal_id = ?');
    $stmt->execute(array($animal_id)); 

    $stmt = $db->prepare('DELETE FROM comments WHERE animal_id = ?');
    $stmt->execute(array($animal_id)); 

    $stmt = $db->prepare('DELETE FROM userApplied WHERE id_animal = ?');
    $stmt->execute(array($animal_id)); 

    $stmt = $db->prepare('DELETE FROM userFav WHERE id_animal = ?');
    $stmt->execute(array($animal_id));  
    return $stmt->fetchAll();
  }

  function getAllPets($user){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * from animal INNER JOIN images on animal.image = images.id');
    $stmt->execute();  
    return $stmt->fetchAll();
  }

  function getMyAdoptedPets($user){
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * from animal INNER JOIN images on animal.image = images.id WHERE adopted='true' AND newowner=?");
    $stmt->execute(array($user));  
    return $stmt->fetchAll();
  }

  function getMyAppliedPets($user){
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM userApplied INNER JOIN animal ON userApplied.id_animal = animal.animal_id INNER JOIN images ON animal.image = images.id INNER JOIN user ON userApplied.id_user = user.username where user.username = ? AND adopted='false'");
    $stmt->execute(array($user));
    return $stmt->fetchAll();
  }

  function getMyFavPets($user){
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM userFav INNER JOIN animal ON userFav.id_animal = animal.animal_id INNER JOIN images ON animal.image = images.id INNER JOIN user ON userFav.id_user = user.username where user.username = ?");
    $stmt->execute(array($user));
    return $stmt->fetchAll();
  }

  function getMyPets($user){
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM user INNER JOIN animal on animal.owner = user.username INNER JOIN images on animal.image = images.id WHERE user.username = ? AND adopted='false'");
    $stmt->execute(array($user));
    return $stmt->fetchAll();
  }

  function getAnimalComments($animal_id){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM comments WHERE animal_id = ?');
    $stmt->execute(array($animal_id));  
    return $stmt->fetchAll();
  }

  function getAnimalById($animal_id){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM animal INNER JOIN images ON animal.image = images.id INNER JOIN factCheck on factID = factCheck.id WHERE animal_id = ?');
    $stmt->execute(array($animal_id));  
    return $stmt->fetchAll();
  }

  function getUsersWhoAppliedForAnimal($animal_id){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM userApplied INNER JOIN user ON userApplied.id_user = user.username INNER JOIN images ON user.profilepicId = images.id INNER JOIN animal ON animal.animal_id = userApplied.id_animal WHERE id_animal=?');
    $stmt->execute(array($animal_id));
    return $stmt->fetchAll();
  }

  function getPetOwner($animal_id){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM animal WHERE animal_id=?');
    $stmt->execute(array($animal_id));  
    return $stmt->fetchAll();
  }

  function get4Pets() {
    $db = new PDO('sqlite:../database/shelter.db');
    $stmt = $db->prepare('SELECT * FROM animal INNER JOIN images ON image=id WHERE adopted="false" limit 4');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getfrontPageNrAnimals() {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM animal INNER JOIN images ON image=id WHERE adopted="false"');
    $stmt->execute();  
    $animals = $stmt->fetchAll();
  
    if (count($animals) <= 4){
      return "No";
    }

    return count($animals) - 4;
  }

  function getFindPetAnimals($floor, $location, $breed, $gender, $age) {
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM animal INNER JOIN images ON image=id WHERE animal_id >= '$floor' AND adopted='false' limit 8");
    $stmt->execute();
    $animals = $stmt->fetchAll();

    $animalstemp = array();

    if ($location != ''){
      foreach ($animals as $animal){
        if ($animal['location'] == $location)
          array_push($animalstemp, $animal);
      }
      $animals = $animalstemp;
      $animalstemp = array();
    }
    if ($breed != ''){
      foreach ($animals as $animal){
        if ($animal['breed'] == $breed)
          array_push($animalstemp, $animal);
      }
      $animals = $animalstemp;
      $animalstemp = array();
    }
    if ($gender != ''){
      foreach ($animals as $animal){
        if ($animal['gender'] == $gender)
          array_push($animalstemp, $animal);
      }
      $animals = $animalstemp;
      $animalstemp = array();
    }
    if ($age != ''){
      foreach ($animals as $animal){
        if ($animal['age'] == $age)
          array_push($animalstemp, $animal);
      }
      $animals = $animalstemp;
      $animalstemp = array();
    }

    return $animals;
  }

  function getAllFilteredAnimals($floor, $location, $breed, $gender, $age) {
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM animal INNER JOIN images ON image=id WHERE animal_id >= '$floor' AND adopted='false'");
    $stmt->execute();
    $animals = $stmt->fetchAll();

    $animalstemp = array();

    if ($location != ''){
      foreach ($animals as $animal){
        if ($animal['location'] == $location)
          array_push($animalstemp, $animal);
      }
      $animals = $animalstemp;
      $animalstemp = array();
    }
    if ($breed != ''){
      foreach ($animals as $animal){
        if ($animal['breed'] == $breed)
          array_push($animalstemp, $animal);
      }
      $animals = $animalstemp;
      $animalstemp = array();
    }
    if ($gender != ''){
      foreach ($animals as $animal){
        if ($animal['gender'] == $gender)
          array_push($animalstemp, $animal);
      }
      $animals = $animalstemp;
      $animalstemp = array();
    }
    if ($age != ''){
      foreach ($animals as $animal){
        if ($animal['age'] == $age)
          array_push($animalstemp, $animal);
      }
      $animals = $animalstemp;
      $animalstemp = array();
    }

    return $animals;
  }
?>
