<?php function draw_animalapplied($animals, $users) { ?>
    <div class="container"></div>
        <div class="backgroundBox">
            <div class="userswhoapplied">
                <h1> Users Who Applied For <?= $animals[0]['animal_name'] ?> </h1>
            </div>  
            <div class = "usercardscontainer">
                <div class = "usercards">
                    <?php foreach ($users as $user) {
                        $id = $user['animal_id'];
                        $userid = $user['id_user'];
                        $link = "../actions/action_givepet.php?animal_id=".$id."&user_id=".$userid;
                        ?>
                        <a href=<?=$link?> style="text-decoration:none">
                            <div class="usercard">
                                <div class = "usercard_image-container">
                                    <img src= <?= $user['title'] ?> alt="logo"/>
                                </div>
                                <div class="usercard_content">
                                    <p class="usercard_title text--medium">
                                        <p class="user"><?=$user['firstname']." ".$user['lastname']?></p>
                                    </p>
                                </div>
                                <div class="usercard_info">
                                    <p class="text--medium">
                                        <p class="user"><?="@".$user['id_user']?></p>
                                    </p>
                                </div>
                                <div class="usercard_info2">
                                    <p class="card_price text--medium">
                                        <p class="user"><?=$user['aboutme']?></p>
                                    </p>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <div class="emptyspace"></div>
            </div>  
        </div>
    </body>
</html>

<?php } ?>