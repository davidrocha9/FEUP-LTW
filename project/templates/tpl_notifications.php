<?php function draw_notifications($adoptionnotifications, $commentnotifications, $applynotifications, $unapplynotifications) { ?>
        <div class="container"></div>
            <div class="backgroundBox">
                <div class="userswhoapplied">
                    <h1> Notifications </h1>
                </div>  
                <div class = "notificationscardscontainer">
                    <div class = "notificationscards">
                        <?php foreach ($adoptionnotifications as $notification) { ?>
                            <div class ="notificationcontainer">
                                <div class="notificationcard">
                                    <div class = "userpicture">
                                        <img src= <?=$notification['title']?> alt="animalpicture"/>
                                    </div>
                                    <label> <?= $notification['formerowner']." gave you ".$notification['animal_name'].". Congratulations!" ?> </label>
                                </div>
                            </div>
                        <?php } ?>
                        <?php foreach ($commentnotifications as $notification) { ?>
                            <div class ="notificationcontainer">
                                <div class="notificationcard">
                                    <div class = "userpicture">
                                        <img src= <?=$notification['title']?> alt="animalpicture"/>
                                    </div>
                                    <label> <?= $notification['user_id']." made a comment on ".$notification['animal_name'].". Go check it out!" ?> </label>
                                </div>
                            </div>
                        <?php } ?>
                        <?php foreach ($applynotifications as $notification) { ?>
                            <div class ="notificationcontainer">
                                <div class="notificationcard">
                                    <div class = "userpicture">
                                        <img src= <?=$notification['title']?> alt="animalpicture"/>
                                    </div>
                                    <label> <?= $notification['user_id']." applied for ".$notification['animal_name'].". Go check it out!" ?> </label>
                                </div>
                            </div>
                        <?php } ?>
                        <?php foreach ($unapplynotifications as $notification) { ?>
                            <div class ="notificationcontainer">
                                <div class="notificationcard">
                                    <div class = "userpicture">
                                        <img src= <?=$notification['title']?> alt="animalpicture"/>
                                    </div>
                                    <label> <?= $notification['user_id']." unapplied for ".$notification['animal_name'].". Go check it out!" ?> </label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="emptyspace"></div>
                </div>  
            </div>
        </body>
    </html>
<?php } ?>