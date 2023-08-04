<?php function draw_frontpage($link, $animals, $numberanimals) { ?>
        <body>
            <div class="frontpagewrap">
                <div class="frontpagecontent">
                    <h1>Find the perfect pet for you</h1>
                    <div class="btn-group">
                        <a href="findpet.php?page=1&location=&breed=&gender=&age=" class="color1">Get Started</a>
                        <a href="about.php">More Details</a>
                    </div>
                </div>

                <div class="wave">
                    <svg class="frontpagewave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#3fc1c9" fill-opacity="1" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,90.7C672,64,768,64,864,74.7C960,85,1056,107,1152,122.7C1248,139,1344,149,1392,154.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>
            </div>             
            
            <div class = "frontpagecardscontainer">
                <div class="featured">
                    <label>Featured Pets</label>
                </div>
                <div class = "frontpagecards">
                    
                    <?php foreach ($animals as $animal) { 
                        $id = $animal['animal_id'];
                        $link = "animalsdetails.php?animal_id=".$id;
                        ?>
                        <a href=<?=$link?> style="text-decoration:none">
                            <div class="frontpagecard">
                                <div class = "frontpagecard_image-container">
                                    <img src=<?= $animal['title'] ?> alt="image"/>
                                </div>
                                <div class="frontpagecard_content">
                                    <div class="frontpagecard_content2">
                                        <p class="frontpagecard_title">
                                            <p class="animal"><?=$animal['animal_name']?></p>
                                        </p>
                                    </div>
                                    <div class="frontpagecard_info">
                                        <p class="animal"><?=$animal['gender']?>, <?=$animal['age']?> years old</p>
                                    </div>
                                    <div class="frontpagecard_info2">
                                        <p class="animal"><?=$animal['location']?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                    <div class="frontpagecard">
                        <div class="paw">
                            <img src="../assets/paw.png" alt="paw" width="100px"/>
                        </div>
                        <div class="morepets">
                            <p><?=$numberanimals?> more pets available on Shelter-Me</p>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>