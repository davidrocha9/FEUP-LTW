<?php function draw_profile($animals, $favanimals, $appliedanimals, $adoptedanimals, $user, $path) { ?>
    <!DOCTYPE html>
    <html>
        <body>
            <div class="container"></div>
            <div class="profilewrap">
                <div class="profilebackgroundBox">
                    <div class="profilemainInfo">
                        <div class = "profilepic">
                            <img src=<?=$path?> alt="profilepic"/>
                        </div>
                        <div class = "name">
                            <p> <?=$user[0]['firstname']?> <?=$user[0]['lastname']?> </p>
                        </div>
                        <div class = "userName">
                            <p> @<?=$user[0]['username']?> </p>
                        </div>
                        <div class = "editProfile">
                            <a href="editprofile.php">
                                <button class="editprofile">Edit Profile</button>
                            </a>
                        </div>
                        <div class = "aboutMe">
                            <p>Lives in <?= $user[0]['city'] ?> </p>
                            About Me
                        </div>
                        <div class = "description">
                        <p> <?=$user[0]['aboutme']?> </p>
                        </div>
                        <div class = "emptyspace">
                        </div>
                    </div>
                    <div class="profilepetscontainer">
                        <div class="petslist">
                            <div class="petsInfo">
                                <div class="title">
                                    <label>My Pets</label>
                                </div>
                                <div class = "profilecards">
                                    <?php foreach ($animals as $animal) { 
                                        $id = $animal['animal_id'];
                                        $link = "animalsdetails.php?animal_id=".$id;
                                        
                                        ?>
                                        <a href=<?=$link?> style="text-decoration:none">
                                        <div class="profilecard">
                                            <div class = "profilecard_image-container">
                                                <img src=<?= $animal['title'] ?> alt="image"/>
                                            </div>
                                            <div class="profilecard_content">
                                                <div class="profilecard_content2">
                                                    <p class="profilecard_title">
                                                        <p class="animal"><?=$animal['animal_name']?></p>
                                                    </p>
                                                </div>
                                                <div class="profilecard_info">
                                                    <p class="animal"><?=$animal['gender']?>, <?=$animal['age']?> years old</p>
                                                </div>
                                                <div class="profilecard_info2">
                                                    <p class="animal"><?=$animal['location']?></p>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="petsInfo">
                                <div class="title">
                                    <label>Pets Applied For</label>
                                </div>
                                <div class = "profilecards">
                                    <?php foreach ($appliedanimals as $animal) { 
                                        $id = $animal['animal_id'];
                                        $link = "animalsdetails.php?animal_id=".$id;
                                        
                                        ?>
                                        <a href=<?=$link?> style="text-decoration:none">
                                        <div class="profilecard">
                                            <div class = "profilecard_image-container">
                                                <img src=<?= $animal['title'] ?> alt="image"/>
                                            </div>
                                            <div class="profilecard_content">
                                                <div class="profilecard_content2">
                                                    <p class="profilecard_title">
                                                        <p class="animal"><?=$animal['animal_name']?></p>
                                                    </p>
                                                </div>
                                                <div class="profilecard_info">
                                                    <p class="animal"><?=$animal['gender']?>, <?=$animal['age']?> years old</p>
                                                </div>
                                                <div class="profilecard_info2">
                                                    <p class="animal"><?=$animal['location']?></p>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="petsInfo">
                                <div class="title">
                                    <label>Favorited Pets</label>
                                </div>
                                <div class = "profilecards">
                                    <?php foreach ($favanimals as $animal) { 
                                        $id = $animal['animal_id'];
                                        $link = "animalsdetails.php?animal_id=".$id;
                                        
                                        ?>
                                        <a href=<?=$link?> style="text-decoration:none">
                                        <div class="profilecard">
                                            <div class = "profilecard_image-container">
                                                <img src=<?= $animal['title'] ?> alt="image"/>
                                            </div>
                                            <div class="profilecard_content">
                                                <div class="profilecard_content2">
                                                    <p class="profilecard_title">
                                                        <p class="animal"><?=$animal['animal_name']?></p>
                                                    </p>
                                                </div>
                                                <div class="profilecard_info">
                                                    <p class="animal"><?=$animal['gender']?>, <?=$animal['age']?> years old</p>
                                                </div>
                                                <div class="profilecard_info2">
                                                    <p class="animal"><?=$animal['location']?></p>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="petsInfo">
                                <div class="title">
                                    <label>Pets I Adopted</label>
                                </div>
                                <div class = "profilecards">
                                    <?php foreach ($adoptedanimals as $animal) { 
                                        $id = $animal['animal_id'];
                                        $link = "animalsdetails.php?animal_id=".$id;
                                        
                                        ?>
                                        <div class="profilecard">
                                            <div class = "profilecard_image-container">
                                                <img src=<?= $animal['title'] ?> alt="image"/>
                                            </div>
                                            <div class="profilecard_content">
                                                <div class="profilecard_content2">
                                                    <p class="profilecard_title">
                                                        <p class="animal"><?=$animal['animal_name']?></p>
                                                    </p>
                                                </div>
                                                <div class="profilecard_info">
                                                    <p class="animal"><?=$animal['gender']?>, <?=$animal['age']?> years old</p>
                                                </div>
                                                <div class="profilecard_info2">
                                                    <p class="animal"><?=$animal['location']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="emptyspace"></div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>