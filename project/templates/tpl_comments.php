  
<?php function show_comments($comments, $id, $owner) {
/**
 * Draws a section (#lists) containing several lists
 * as articles. Uses the draw_list function to draw
 * each list.
 */ ?>
    
    <?php 
        include_once('../includes/session.php');
        $db = new PDO('sqlite:../database/shelter.db');

        $stmt = $db->prepare("SELECT * from user INNER JOIN comments ON user.username = comments.username INNER JOIN images on user.profilepicID = images.id WHERE animal_id = $id");
        $stmt->execute();  
        $users = $stmt->fetchAll();

        if (isset($_SESSION['username'])){
            $loggeduserusername = $_SESSION['username'];

            $stmt2 = $db->prepare("SELECT * from user INNER JOIN images on id = profilepicID WHERE username='$loggeduserusername'");
            $stmt2->execute();  
            $loggeduser = $stmt2->fetchAll();
        }

        $stmt3 = $db->prepare("SELECT * from comments");
        $stmt3->execute();  
        $allcomments = $stmt3->fetchAll();

        if (count($allcomments) == 0 )
            $lastid = 0;
        else    
            $lastid = $allcomments[count($allcomments) - 1]['id'];

        $currentid = $lastid + 1;

        $userid = 0;
    ?>

    <head> <script src="../js/script.js" defer></script> </head>
    
    <div class="comments" id ="comments">
        <h1> <?=count($comments)?> Comments </h1>
        <input type="hidden" name="lastcommentid" value="<?=$lastid?>">
        <input type="hidden" name="commentid" value="<?=$currentid?>">
        <?php foreach ($comments as $comment) { ?>
            <div class="comment" id="comment">
                <article>
                    <div class = "userpicture">
                        <img src= <?=$users[$userid]['title']?> alt="animalpicture"/>
                    </div>
                    <div class="commentandpostedby">
                        <div class="postedby">
                            <div class="commentername"><?=$users[$userid]['firstname']." ".$users[$userid]['lastname']?></div>
                            <div class="commenterusername"><?="(@".$users[$userid]['username'].")"?></div>
                        </div>
                        <div class="text">
                            <p> <?=strip_tags($comment['text']);++$userid?></p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="divisor"></div>
        <?php } ?>
    </div>

    <div class = "addcomment">
        <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
            <form name="addcomment">
                <label> Add a Comment </label>
                <div class="textinput">
                    <textarea name="text"></textarea>
                </div>
                <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
                <input type="hidden" name="animalid" value="<?=$id?>">
                <input type="hidden" name="firstname" value="<?=$loggeduser[0]['firstname']?>">  
                <input type="hidden" name="lastname" value="<?=$loggeduser[0]['lastname']?>">  
                <input type="hidden" name="owner" value="<?=$owner?>">  
                <input type="submit" class="replycomment" value="Post">
            </form>
        <?php } else { ?>
            <form name="addcomment">
                <label> Add a Comment </label>
                &nbsp;
                &nbsp;
                <p> Login to post a comment! </p>
            </form>
        <?php } ?>
    </div>

    <div class="emptyspace"></div>

  </section>
<?php } ?>