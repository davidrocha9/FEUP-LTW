<?php function show_favAndApplied($id, $animals, $owner) {
/**
 * Draws a section (#lists) containing several lists
 * as articles. Uses the draw_list function to draw
 * each list.
 */ ?>
    
    <?php 
        $db = new PDO('sqlite:../database/shelter.db');
        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $stmt4 = $db->prepare("SELECT * FROM userApplied where id_animal = '$id' and id_user = '$username'");
            $stmt4->execute();  
            $appliedaux = $stmt4->fetchAll();
            $applied = empty($appliedaux);
        
            $stmt5 = $db->prepare("SELECT * FROM userFav where id_animal = '$id' and id_user = '$username'");
            $stmt5->execute();  
            $favoritedaux = $stmt5->fetchAll();
            $favorited = empty($favoritedaux);
        }
        
        $applylink = "../actions/action_applyanimal.php?animalid=".$id;
        $unapplylink = "../actions/action_unapplyanimal.php?animalid=".$id;
    
        $favlink = "../actions/action_favanimal.php?animalid=".$id;
        $unfavlink = "../actions/action_unfavanimal.php?animalid=".$id;

        $check = "../pages/animalapplied.php?animalid=".$id;
        $edit = "../pages/editpet.php?animal_id=".$id;
    ?>

        <div class = "grid">
            <?php if (isset($_SESSION['username'])) { ?>
                <?php if ($_SESSION['username'] != $animals[0]['owner']) { ?>
                    <div class = "applyandfav">
                        <?php if ($applied) { ?>
                            <a href= <?=$applylink?> style="text-decoration:none">
                                <button type="submit" class="apply-btn">Apply For Adoption </button>
                                <input type="hidden" name="animalid" value="<?=$animals[0]?>">
                            </a>
                        <?php } else { ?>
                            <a href=<?=$unapplylink?> style="text-decoration:none">
                                <button type="submit" class="apply-btn">Unapply For Adoption </button>
                                <input type="hidden" name="animalid" value="<?=$animals[0]?>">
                            </a>
                        <?php } ?>
                        <?php if ($favorited) { ?>
                            <a href= <?=$favlink?>>
                                <div class="heart">
                                    <i class="material-icons">favorite_border</i>
                                </div>
                            </a>
                        <?php } else { ?>
                            <a href= <?=$unfavlink?>>
                                <div class="heart">
                                    <i class="material-icons">favorite</i>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class = "applyandfav">
                        <a href= <?=$check?> style="text-decoration:none">
                            <button type="submit" class="apply-btn"> Check Who Applied </button>
                            <input type="hidden" name="animalid" value="<?=$animals[0]?>">
                        </a>
                        <a href= <?="../actions/action_deletepet.php?animal_id=".$id?> style="text-decoration:none">
                            <button type="submit" class="apply-btn"> Delete Pet </button>
                            <input type="hidden" name="animalid" value="<?=$animals[0]?>">
                        </a>
                    </div>  
                <?php } ?>
            <?php }?>
        </div>
    </div>
    <div class = "animalpicture">
        <img src= <?= $animals[0]['title'] ?> class="animalpic" width="350px"/>
        <?php if (isset($_SESSION['username'])) { ?>
            <?php if ($_SESSION['username'] != $animals[0]['owner']) { ?>
                <div class = "ownedby">
                    <img src= <?= $owner['title'] ?> class="profilepic" width="10px"/>
                    <label> Fostered by <?=$owner['firstname']." ".$owner['lastname']?> </label>
                </div>
            <?php } else { ?>
                <div class = "ownedby">
                    <div class = "editbutton">
                        <a href= <?=$edit?> style="text-decoration:none">
                            <button type="submit" class="edit-btn"> Edit Pet Details </button>
                            <input type="hidden" name="animalid" value="<?=$animals[0]?>">
                        </a>
                    </div>
                </div>
            <?php } ?>
        <?php }?>
    </div>
        
<?php } ?>