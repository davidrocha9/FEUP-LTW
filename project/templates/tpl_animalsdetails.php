<?php function draw_animalsdetails($id, $animals, $owner, $comments) { ?>

    <?php 
    ?>

    <!DOCTYPE html>
    <html>
        <body>
            <div class="container"></div>
            <div class="backgroundBox">
                <div class="animalname">
                    Hello, my name is <?=strip_tags($animals[0]['animal_name'])?>
                </div>
                <div class = "infoandpic">
                    <div class ="info">
                        <div class="personaldetails">
                            <label> Personal Details </label>
                        </div>
                        <div class="breed">
                            <label> Breed: <?=$animals[0]['breed']?> </label>
                        </div>
                        <div class="age">
                            <label> Age: <?=$animals[0]['age']?> years old </label>
                        </div>
                        <div class="gender">
                            <label> Gender: <?=$animals[0]['gender']?> </label>
                        </div>
                        <div class="size">
                            <label> Size: <?=$animals[0]['size']?> </label>
                        </div>
                        <div class="location">
                            <label> Location: <?=$animals[0]['location']?> </label>
                        </div>
                        <div class="reasons">
                            <label> Reasons for Adoption: <?=$animals[0]['reasons']?> </label>
                        </div>
                        <div class="keeptime">
                            <label> Max Keep Time: <?=$animals[0]['keep_time']?> </label>
                        </div>

                        <div class="aboutme">
                            <label> Facts </label>
                        </div>
                        <div class="story">
                            <label> Chipped: <?=$animals[0]['chip']?> </label>
                        </div>
                        <div class="story">
                            <label> Trained: <?=$animals[0]['trained']?> </label>
                        </div>
                        <div class="story">
                            <label> Purebred: <?=$animals[0]['purebred']?> </label>
                        </div>
                        <div class="story">
                            <label> Good with Kids: <?=$animals[0]['kids']?> </label>
                        </div>
                        <div class="specialNeeds">
                            <label> Special Needs: <?=$animals[0]['specialNeeds']?> </label>
                        </div>

                        <div class="aboutme">
                            <label> My Story </label>
                        </div>
                        <div class="story">
                            <label> <?=$animals[0]['story']?> </label>
                        </div>
                        
                        <?php show_favAndApplied($id, $animals, $owner); ?>
                </div>
                
                <?php show_comments($comments, $id, $owner['title']); ?>
            </div>
        </body>
    </html>
<?php } ?>