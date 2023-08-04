<?php function draw_rehome_final() { ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Rehome a Pet</title>
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <header>
                <div class="menu">
                    <div class="logo">
                        <a href="frontpage.php">
                            <img src="../assets/logo.png" alt="logo" width="100px"/>
                        </a>
                    </div>
                    <nav>
                        <ul>
                        <li><a href="findpet.php?page=1">Find a Pet</a></li>
                        <li><a href="rehomeapet.php">Rehome a Pet</a></li>
                        <li><a href="whyadopt.php">Why Adopt?</a></li>
                        <li><a href="#">Pet Care</a></li>
                        <li><a href="#">About</a></li>
                        </ul>
                    </nav>
                </div>
                <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
                    <div class="usernameLogout">
                        <div class="username">
                            <?=$_SESSION['username']?>
                        </div>
                        <a href="profilepage.php">
                            <div class="account">
                                <div class="accountIcon">
                                    <i class="material-icons" style="font-size:35px">account_circle</i>
                                </div>
                            </div>
                        </a>
                        <a href="../actions/action_logout.php">
                            <div class="logout">
                                <div class="logoutIcon">
                                    <i class="material-icons" style="font-size:35px">logout</i>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } else { ?>
                    <a href="login.php">
                        <button class="signup">Login / Signup</button>
                    </a>
                <?php } ?>
            </header>
            
            <section class="video">
                <video playsinline autoplay muted loop id="pet_video">
                    <source src="../assets/pet_video.mp4" type="video/mp4">
                </video>
                <div class="thanks">
                    <h1>
                        Thanks for adding your pet! <br> <br>
                        You can check your posts and change it anytime.
                    </h1> 
                </div>
            </section>
            
        </body>
    </html>
<?php } ?>

<?php function draw_rehome_faq() { ?>
        <section class="video">
            <video playsinline autoplay muted loop id="pet_video">
                <source src="../assets/pet_video.mp4" type="video/mp4">
            </video>
            <div class="rehome_pet">
                <h1>
                    Rehome Your Pet
                </h1>
            </div>
            <div class="home">
                <h2>
                    Find Your Pet a Forever Home
                </h2>
            </div>
            <div class = "get_started_button">
                <a href="rehomeapet_faq.php" class="scroll_down">
                    <div class="mouse">
                        <div class="mousespan"></div>
                    </div>
                    <div class="arrow">
                        <div class="arrowspan"></div>
                    </div>
                </a>
            </div>
        </section>
        
    </body>
    </html>
<?php } ?>

<?php function draw_rehome() { ?>
        <script defer src="../js/button.js"></script>   
        <div class="container"></div>
        <section id="main_container">
            <form method="post" action= "../database/addPetPhoto.php" id="addpet" class="input-group" enctype="multipart/form-data">
                <ul>
                        <section id="initial_section">
                            <section id="stages">
                                <div class="stage_2">

                                    <h2>
                                        <br>  Start <br>
                                    </h2>
                                    
                                </div>
                            </section>
                            <br>

                            <!--<section id="small_introduction">
                                <h4>
                                    Are you looking for a new home for your pet? If so, you are in the right place!<br><br>
                                    Set up your pet's profile in just a few minutes. 
                                </h4>
                            </section>->-->

                            <label for="reasons" >Why do you need to rehome your pet?<br><br></label>
                            <div class="question_box">
                                <select name="reasons" required>
                                    <option value selected="selected">Select One</option>
                                    <option value="Found or abandoned">Found or abandoned</option>
                                    <option value="Human health issues">Human health issues (e.g. allergies)</option>
                                    <option value="Medical expenses too high">Medical expenses too high</option>
                                    <option value="Landlord permission issues">Landlord permission issues</option>
                                    <option value="Behavorial issues">Behavorial issues</option>
                                    <option value="Life circumstances don't allow me to have a pet">Life circumstances don't allow me to have a pet</option>
                                </select>
                            </div>
                            <label for="keep_time" >How long are you able to keep your pet while we help you found a cozy new home?<br><br></label>
                            <div class="question_box">
                                <select name="keep_time" required>
                                    <option value selected="selected">Select One</option>
                                    <option value="1 Week">1 Week</option>
                                    <option value="2 Weeks">2 Weeks</option>
                                    <option value="3 Weeks">3 Weeks</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="2 Months">2 Months</option>
                                    <option value="More">More than 2 Months</option>
                                </select>
                            </div>
                        </section>

                        <section id="pet_profile_section">
                                <section id="stages">
                                    <div class="stage_2">
        
                                        <h2>
                                            <br> Pet's profile <br>
                                        </h2>
                                        
                                    </div>
                                </section>
                                <br>

                                <label for="pet_name">Name <br><br></label>
                                <div class="question_box">
                                    <input type="text" name="pet_name" placeholder="Your pet's name" required><br><br>
                                </div>
                                <br><br>

                                <label for="pet_type" >What type of pet are you rehoming?<br><br></label>
                                <div class="question_box">
                                    <select name="pet_type" required>
                                        <option value selected="selected">Select One</option>
                                        <option value="Dog">Dog</option>
                                        <option value="Cat">Cat</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <label for="pet_breed">Breed <br><br></label>
                                <div class="question_box">
                                    <select name="pet_breed" required>
                                        <option value selected="selected">Select One</option>
                                        <option value="Cat">---- Cats ----</option>
                                        <option value="Siamese" >Siamese</option>
                                        <option value="Persian" >Persian</option>
                                        <option value="Maine Coon" >Maine Coon</option>
                                        <option value="Ragdoll" >Ragdoll</option>
                                        <option value="Bengal" >Bengall</option>
                                        <option value="Abyssinian" >Abyssinian</option>
                                        <option value="Birman" >Birman</option>
                                        <option value="Oriental Short Hair" >Oriental Short Hair</option>
                                        <option value="Sphynx" >Sphynx</option>
                                        <option value="Devon Rex" >Devon Rex</option>
                                        <option value="Himalayan" >Himalayan</option>
                                        <option value="American Short Hair" >American Short Hair</option>
                                        <option value="Other" >Other</option>
                                        <option value="Dog">---- Dogs ----</option>
                                        <option value="Labrador Retriever">Labrador Retriever</option>
                                        <option value="Bulldog">Bulldog</option>
                                        <option value="Golden Retriever">Golden Retriever</option>
                                        <option value="German Shepherd">German Shepherd</option>
                                        <option value="French Bulldog">French Bulldog</option>
                                        <option value="Beagle">Beagle</option>
                                        <option value="Poodle">Poodle</option>
                                        <option value="Yorkshire Rerrier">Yorkshire Terrier</option>
                                        <option value="Rottweiler">Rottweiler</option>
                                        <option value="Boxer">Boxer</option>
                                        <option value="Dachsund">Dachsund</option>
                                        <option value="Siberian Husky">Siberian Husky</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Welsh Corgi">Welsh Corgi</option>
                                        <option value="Shitzu">Shi-Tzu</option>
                                        <option value="Pug">Pug</option>
                                        <option value="Cavalier King Charles Spaniel">Cavalier King Charles Spaniel</option>
                                        <option value="Dobermannn">Dobermann</option>
                                        <option value="Boston Terrier">Boston Terrier</option>
                                        <option value="King Charles Spaniel">King Charles Spaniel</option>
                                        <option value="Bull Terrier">Bull Terrier</option>
                                        <option value="Basset Hound">Basset Hound</option>
                                        <option value="Saint Bernard">Saint Bernard</option>
                                        <option value="Shibainu">Shiba Inu</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                

                                <label for="gender">Gender<br><br></label>
                                <div class="question_box">
                                    <select name="gender" required>
                                        <option value selected="selected">Select One</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Other">I don't know</option>
                                    </select>
                                </div>

                                <label for="age" >Age<br><br></label>
                                <div class="question_box">
                                    <select name="age" required>
                                        <option value selected="selected">Select One</option>
                                        <option value="1">1 Year Old</option>
                                        <option value="2">2 Years Old</option>
                                        <option value="3">3 Years Old</option>
                                        <option value="4">4 Years Old</option>
                                        <option value="5">5 Years Old</option>
                                        <option value="6">6 Years Old</option>
                                        <option value="7">7 Years Old</option>
                                        <option value="8">8 Years Old</option>
                                        <option value="9">9 Years Old</option>
                                        <option value="10">10 Years Old</option>
                                        <option value=">10">More than 10 Years Old</option>
                                    </select>
                                </div>

                                <label for="size">Size<br><br></label>
                                <div class="question_box">
                                    <select name="size" required>
                                        <option value selected="selected">Select One</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="X-Large">X-Large</option>
                                    </select>
                                </div>

                                <label for="spayed_neutered">Is your pet spayed or neutered?<br><br></label>
                                <div class="question_box">
                                    <select name="spayed_neutered" required>
                                        <option value selected="selected">Select One</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="Other">I don't know</option>
                                    </select>
                                </div>

                                <label for="photo">Photo <br><br></label>
                                <div id="photo_div">
                                    <section id="photo_section">
                                        <div class="img_container">
                                            <div class="img_wrapper">
                                                <div class="image">
                                                <img id="img_img" src="" alt="">
                                                </div>
                                                <div class="img_content">
                                                    <div class="icon"><i class="material-icons">&#xe3b0;</i></div>
                                                </div>
                                                
                                                <div class="cancel_button"><i class="material-icons">&#xe5c9;</i></div>
                                            </div>
                                            <input type="file" id="default_button" name="img_name" hidden required>
                                            <input type="button" id="custom_button" value="CHOOSE FILE" onclick="document.getElementById('default_button').click();" required>
                                        </div>
                                    </section>
                                </div>
                        </section>    

                        <section id="key_facts_section">
                            <section id="stages">
                                <div class="stage_3">
                                    <h2>
                                        <br> Key Facts
                                    </h2>
                                </div>
                            </section>
                            <br>

                            <label for="chip">Microchipped <br><br></label>
                            <div class="question_box">
                                <div class="radioButton">
                                <label for="yes">
                                    <input type="radio" name="chip" value="Yes">Yes <br>
                                </label>
                                <label for="no">
                                    <input type="radio" name="chip" value="No">No <br>
                                </label> 
                                <label for="unknown">
                                    <input type="radio" name="chip" value="Unknown">I don't know
                                </label>
                                </div>
                            </div>

                            <label for="trained">House-trained <br><br></label>
                            <div class="question_box">
                                <div class="radioButton">
                                    <label for="yes">
                                        <input type="radio" name="trained" value="Yes">Yes <br>
                                    </label>
                                    <label for="no">
                                        <input type="radio" name="trained" value="No">No <br>
                                    </label>
                                    <label for="unknown">
                                        <input type="radio" name="kids" value="Unknown">I don't know
                                    </label>
                                </div>
                            </div>

                            <label for="kids">Good with kids <br><br></label>
                            <div class="question_box">
                                <div class="radioButton">
                                    <label for="yes">
                                        <input type="radio" name="kids" value="Yes">Yes <br>
                                    </label>
                                    <label for="no">
                                        <input type="radio" name="kids" value="No">No <br>
                                    </label>
                                    <label for="unknown">
                                        <input type="radio" name="kids" value="Unknown">I don't know
                                    </label>
                                </div>
                            </div>

                            <label for="purebred">Purebred <br><br></label>
                            <div class="question_box">
                                <div class="radioButton">
                                    <label for="yes">
                                        <input type="radio" name="purebred" value="Yes">Yes <br>
                                    </label>
                                    <label for="no">
                                        <input type="radio" name="purebred" value="No">No <br>
                                    </label>
                                    <label for="unknown">
                                        <input type="radio" name="kids" value="Unknown">I don't know
                                    </label>
                                </div>
                            </div>

                            <label for="special_needs">Special needs<br><br></label>
                            <div class="question_box">
                                <input type="text" name="special_needs">
                            </div>
                        </section>

                        <section id="pet_story_section">
                            <section id="stages">
                                <div class="stage_3">

                                    <h2>
                                        <br> Pet's Story
                                    </h2>

                                </div>
                            </section>
                            
                            <label for="story">
                                <p>Share anything you want about your pet. </p>
                                &nbsp;
                                <p>What adjectives would you use to describe your pet? Where did you acquire him? What are you looking for in a new home? </p>
                            </label>
                            <div class="question_box">
                                <div class="story">
                                    <textarea maxlength="2000" name="story" id="pet_story" cols="30" rows="12" placeholder="Describe something about your little buddy"></textarea>
                                </div>
                            </div>

                            <div class = "next_page">
                                <button type="submit" class="submit_button"> CONFIRM </button>
                                <input type="hidden" name="animalid" value="<?=$animals[0]?>">
                            </div>
                        </section>
                    
                </ul>
            </form>
        </section>
        
    </body>
</html>
<?php } ?>