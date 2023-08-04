<?php function draw_editpet($user, $animal) { ?>
    <div class="container"></div>
        <script defer src="../js/button.js"></script>
                <img src="../assets/background.jpg" id="bg" alt="background_img">

                <section id="main_container">
                    
                        <form method="post" action="../actions/action_editpet.php" id="addpet" enctype="multipart/form-data">
                        <input type="hidden" name = "token" value = "<?=$_SESSION['csrf']?>">
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

                                    <input type="hidden" value=<?=$animal[0]['animal_id']?> name="animal_id">
                                    <input type="hidden" value=<?=$animal[0]['factID']?> name="factcheck_id">
                                    <input type="hidden" value=<?=$animal[0]['image']?> name="image_id">
            
                                    <label for="reasons" >Why do you need to rehome your pet?<br><br></label>
                                    
                                    <div class="question_box">
                                        <select name="reasons">
                                            <option value="Found or abandoned"<?php if($animal[0]['reasons']=="abandoned"){echo ' selected="selected"';}?>>Found or abandoned</option>
                                            <option value="Human health issues"<?php if($animal[0]['reasons']=="health_human"){echo ' selected="selected"';}?>>Human health issues (e.g. allergies)</option>
                                            <option value="Medical expenses too high"<?php if($animal[0]['reasons']=="medical_costs"){echo ' selected="selected"';}?>>Medical expenses too high</option>
                                            <option value="Landlord permission issues"<?php if($animal[0]['reasons']=="permission"){echo ' selected="selected"';}?>>Landlord permission issues</option>
                                            <option value="Behavorial issues"<?php if($animal[0]['reasons']=="behavorial"){echo ' selected="selected"';}?>>Beahvorial issues</option>
                                            <option value="Life circumstances don't allow me to have a pet"<?php if($animal[0]['reasons']=="maintain_costs"){echo ' selected="selected"';}?>>Life circumstances don't allow me to have a pet</option>
                                        </select>
                                    </div>
                                    <label for="keep_time" >How long are you able to keep your pet while we help you found a cozy new home?<br><br></label>
                                    <div class="question_box">
                                        <select name="keep_time">
                                            <option value="1 Week"<?php if($animal[0]['keep_time']=="1week"){echo ' selected="selected"';}?>>1 week</option>
                                            <option value="2 Weeks"<?php if($animal[0]['keep_time']=="2weeks"){echo ' selected="selected"';}?>>2 weeks</option>
                                            <option value="3 Weeks"<?php if($animal[0]['keep_time']=="3weeks"){echo ' selected="selected"';}?>>3 weeks</option>
                                            <option value="1 Month"<?php if($animal[0]['keep_time']=="1month"){echo ' selected="selected"';}?>>1 month</option>
                                            <option value="2 Months"<?php if($animal[0]['keep_time']=="2months"){echo ' selected="selected"';}?>>2 months</option>
                                            <option value="More"<?php if($animal[0]['keep_time']=="more"){echo ' selected="selected"';}?>>More than 2 months</option>
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
                                        <input type="text" name="pet_name" value=<?=$animal[0]['animal_name']?>>
                                    </div>
                                    <br><br>
            
                                    <label for="pet_type" >What type of pet are you rehoming?<br><br></label>
                                    <div class="question_box">
                                        <select name="pet_type">
                                            <option value="Dog"<?php if($animal[0]['species']=="dog"){echo ' selected="selected"';}?>>Dog</option>
                                            <option value="Cat"<?php if($animal[0]['species']=="cat"){echo ' selected="selected"';}?>>Cat</option>
                                            <option value="Other"<?php if($animal[0]['species']=="other"){echo ' selected="selected"';}?>>Other</option>
                                        </select>
                                    </div>
                                    
                                    <label for="pet_breed">Breed <br><br></label>
                                    <div class="question_box">
                                        <select name="pet_breed">
                                            <option value="Cat"<?php if($animal[0]['breed']=="Cat"){echo ' selected="selected"';}?>>---- Cats ----</option>
                                            <option value="Siamese"<?php if($animal[0]['breed']=="Siamese"){echo ' selected="selected"';}?>>Siamese</option>
                                            <option value="Persian"<?php if($animal[0]['breed']=="Persian"){echo ' selected="selected"';}?>>Persian</option>
                                            <option value="Maine Coon"<?php if($animal[0]['breed']=="Maine Coon"){echo ' selected="selected"';}?>>Maine Coon</option>
                                            <option value="Ragdoll"<?php if($animal[0]['breed']=="Ragdoll"){echo ' selected="selected"';}?>>Ragdoll</option>
                                            <option value="Bengal"<?php if($animal[0]['breed']=="Bengal"){echo ' selected="selected"';}?>>Bengall</option>
                                            <option value="Abyssinian"<?php if($animal[0]['breed']=="Abyssinian"){echo ' selected="selected"';}?>>Abyssinian</option>
                                            <option value="Birman"<?php if($animal[0]['breed']=="Birman"){echo ' selected="selected"';}?>>Birman</option>
                                            <option value="Oriental Short Hair"<?php if($animal[0]['breed']=="Oriental Short Hair"){echo ' selected="selected"';}?>>Oriental Short Hair</option>
                                            <option value="Sphynx"<?php if($animal[0]['breed']=="Sphynx"){echo ' selected="selected"';}?>>Sphynx</option>
                                            <option value="Devon Rex"<?php if($animal[0]['breed']=="Devon Rex"){echo ' selected="selected"';}?>>Devon Rex</option>
                                            <option value="Himalayan"<?php if($animal[0]['breed']=="Himalayan"){echo ' selected="selected"';}?>>Himalayan</option>
                                            <option value="American Short Hair"<?php if($animal[0]['breed']=="American Short Hair"){echo ' selected="selected"';}?>>American Short Hair</option>
                                            <option value="Other"<?php if($animal[0]['breed']=="Other"){echo ' selected="selected"';}?>>Other</option>
                                            <option value="Dog"<?php if($animal[0]['breed']=="Dog"){echo ' selected="selected"';}?>>---- Dogs ----</option>
                                            <option value="Labrador Retriever"<?php if($animal[0]['breed']=="Labrador Retriever"){echo ' selected="selected"';}?>>Labrador Retriever</option>
                                            <option value="Bulldog"<?php if($animal[0]['breed']=="Bulldog"){echo ' selected="selected"';}?>>Bulldog</option>
                                            <option value="Golden Retriever"<?php if($animal[0]['breed']=="Golden Retriever"){echo ' selected="selected"';}?>>Golden Retriever</option>
                                            <option value="German Shepherd"<?php if($animal[0]['breed']=="German Shepherd"){echo ' selected="selected"';}?>>German Shepherd</option>
                                            <option value="French Bulldog"<?php if($animal[0]['breed']=="French Bulldog"){echo ' selected="selected"';}?>>French Bulldog</option>
                                            <option value="Beagle"<?php if($animal[0]['breed']=="Beagle"){echo ' selected="selected"';}?>>Beagle</option>
                                            <option value="Poodle"<?php if($animal[0]['breed']=="Poodle"){echo ' selected="selected"';}?>>Poodle</option>
                                            <option value="Yorkshire Rerrier"<?php if($animal[0]['breed']=="Yorkshire Rerrier"){echo ' selected="selected"';}?>>Yorkshire Terrier</option>
                                            <option value="Rottweiler"<?php if($animal[0]['breed']=="Rottweiler"){echo ' selected="selected"';}?>>Rottweiler</option>
                                            <option value="Boxer"<?php if($animal[0]['breed']=="Boxer"){echo ' selected="selected"';}?>>Boxer</option>
                                            <option value="Dachsund"<?php if($animal[0]['breed']=="Dachsund"){echo ' selected="selected"';}?>>Dachsund</option>
                                            <option value="Siberian Husky"<?php if($animal[0]['breed']=="Siberian Husky"){echo ' selected="selected"';}?>>Siberian Husky</option>
                                            <option value="Chihuahua"<?php if($animal[0]['breed']=="Chihuahua"){echo ' selected="selected"';}?>>Chihuahua</option>
                                            <option value="Welsh Corgi"<?php if($animal[0]['breed']=="Welsh Corgi"){echo ' selected="selected"';}?>>Welsh Corgi</option>
                                            <option value="Shitzu"<?php if($animal[0]['breed']=="Shitzu"){echo ' selected="selected"';}?>>Shi-Tzu</option>
                                            <option value="Pug"<?php if($animal[0]['breed']=="Pug"){echo ' selected="selected"';}?>>Pug</option>
                                            <option value="Cavalier King Charles Spaniel"<?php if($animal[0]['breed']=="Cavalier King Charles Spaniel"){echo ' selected="selected"';}?>>Cavalier King Charles Spaniel</option>
                                            <option value="Dobermannn"<?php if($animal[0]['breed']=="Dobermannn"){echo ' selected="selected"';}?>>Dobermann</option>
                                            <option value="Boston Terrier"<?php if($animal[0]['breed']=="Boston Terrier"){echo ' selected="selected"';}?>>Boston Terrier</option>
                                            <option value="King Charles Spaniel"<?php if($animal[0]['breed']=="King Charles Spaniel"){echo ' selected="selected"';}?>>King Charles Spaniel</option>
                                            <option value="Bull Terrier"<?php if($animal[0]['breed']=="Bull Terrier"){echo ' selected="selected"';}?>>Bull Terrier</option>
                                            <option value="Basset Hound"<?php if($animal[0]['breed']=="Basset Hound"){echo ' selected="selected"';}?>>Basset Hound</option>
                                            <option value="Saint Bernard"<?php if($animal[0]['breed']=="Saint Bernard"){echo ' selected="selected"';}?>>Saint Bernard</option>
                                            <option value="Shibainu"<?php if($animal[0]['breed']=="Shibainu"){echo ' selected="selected"';}?>>Shiba Inu</option>
                                            <option value="Other"<?php if($animal[0]['breed']=="Other"){echo ' selected="selected"';}?>>Other</option>
                                        </select>
                                    </div>
                                    
                                    
                                    <label for="gender">Gender<br><br></label>
                                    <div class="question_box">
                                        <select name="gender">
                                            <option value="Female"<?php if($animal[0]['gender']=="Female"){echo ' selected="selected"';}?>>Female</option>
                                            <option value="Male"<?php if($animal[0]['gender']=="Male"){echo ' selected="selected"';}?>>Male</option>
                                            <option value="Other"<?php if($animal[0]['gender']=="Other"){echo ' selected="selected"';}?>>I don't know</option>
                                        </select>
                                    </div>
                                    
                                    <label for="age" >Age<br><br></label>
                                    <div class="question_box">
                                        <select name="age">
                                            <option value="1"<?php if($animal[0]['age']=="1"){echo ' selected="selected"';}?>>1 Year Old</option>
                                            <option value="2"<?php if($animal[0]['age']=="2"){echo ' selected="selected"';}?>>2 Years Old</option>
                                            <option value="3"<?php if($animal[0]['age']=="3"){echo ' selected="selected"';}?>>3 Years Old</option>
                                            <option value="4"<?php if($animal[0]['age']=="4"){echo ' selected="selected"';}?>>4 Years Old</option>
                                            <option value="5"<?php if($animal[0]['age']=="5"){echo ' selected="selected"';}?>>5 Years Old</option>
                                            <option value="6"<?php if($animal[0]['age']=="6"){echo ' selected="selected"';}?>>6 Years Old</option>
                                            <option value="7"<?php if($animal[0]['age']=="7"){echo ' selected="selected"';}?>>7 Years Old</option>
                                            <option value="8"<?php if($animal[0]['age']=="8"){echo ' selected="selected"';}?>>8 Years Old</option>
                                            <option value="9"<?php if($animal[0]['age']=="9"){echo ' selected="selected"';}?>>9 Years Old</option>
                                            <option value="10"<?php if($animal[0]['age']=="10"){echo ' selected="selected"';}?>>10 Years Old</option>
                                            <option value=">10"<?php if($animal[0]['age']==">10"){echo ' selected="selected"';}?>>More than 10 Years Old</option>
                                        </select>
                                    </div>
                                    
                                    <label for="size">Size<br><br></label>
                                    <div class="question_box">
                                        <select name="size">
                                            <option value="Small"<?php if($animal[0]['size']=="Small"){echo ' selected="selected"';}?>>Small</option>
                                            <option value="Medium"<?php if($animal[0]['size']=="Medium"){echo ' selected="selected"';}?>>Medium</option>
                                            <option value="Large"<?php if($animal[0]['size']=="Large"){echo ' selected="selected"';}?>>Large</option>
                                            <option value="X-Large"<?php if($animal[0]['size']=="X-Large"){echo ' selected="selected"';}?>>X-Large</option>
                                        </select>
                                    </div>
                                    
                                    <label for="spayed_neutered">Is your pet spayed or neutered?<br><br></label>
                                    <div class="question_box">
                                        <select name="spayed_neutered">
                                            <option value="Yes"<?php if($animal[0]['spayed_neutered']=="Yes"){echo ' selected="selected"';}?>>Yes</option>
                                            <option value="No"<?php if($animal[0]['spayed_neutered']=="No"){echo ' selected="selected"';}?>>No</option>
                                            <option value="Other"<?php if($animal[0]['spayed_neutered']=="Other"){echo ' selected="selected"';}?>>I don't know</option>
                                        </select>
                                    </div>
            
                                    <label for="photo">Photo <br><br></label>
                                    <div id="photo_div">
                                        <section id="photo_section">
                                            <div class="img_container">
                                                <div class="img_wrapper">
                                                    <div class="image">
                                                    <img id="img_img" src=<?=$animal[0]['title']?> alt="">
                                                    </div>
                                                    <div class="img_content">
                                                        <div class="icon"><i class="material-icons">&#xe3b0;</i></div>
                                                    </div>
                                                    
                                                    <div class="cancel_button"><i class="material-icons">&#xe5c9;</i></div>
                                                </div>
                                                <input type="file" id="default_button" name="img_name" hidden>
                                                <input type="button" id="custom_button" value="CHOOSE FILE" onclick="document.getElementById('default_button').click();">
                                            </div>
                                        </section>
                                    </div>
                                </section>
                            <section id="key_facts_section">
                                <section id="stages">
                                    <div class="stage_3">
                                        <h2>
                                            <br>  Key Facts
                                        </h2>
                                    </div>
                                </section>
                                
                                <br>
                                <label for="chip">Microchipped <br><br></label>
                                <div class="question_box">
                                    <div class="radioButton">
                                        <label for="yes">
                                            <input type="radio" name="chip" value="Yes"<?php if($animal[0]['chip']=="Yes"){echo ' checked="checked"';}?>>Yes <br>
                                        </label>
                                        <label for="no">
                                            <input type="radio" name="chip" value="No"<?php if($animal[0]['chip']=="No"){echo ' checked="checked"';}?>>No <br>
                                        </label>
                                        <label for="unknown">
                                            <input type="radio" name="chip" value="Unknown"<?php if($animal[0]['chip']=="Unknown"){echo ' checked="checked"';}?>>I don't know <br> <br>
                                        </label>
                                    </div>
                                </div>
                                
                                <label for="trained">House-trained <br><br></label>
                                <div class="question_box">
                                    <div class="radioButton">
                                        <label for="yes">
                                            <input type="radio" name="trained" value="Yes"<?php if($animal[0]['trained']=="Yes"){echo ' checked="checked"';}?>>Yes <br>
                                        </label>
                                        <label for="no">
                                            <input type="radio" name="trained" value="No"<?php if($animal[0]['trained']=="No"){echo ' checked="checked"';}?>>No <br>
                                        </label>
                                        <label for="unknown">
                                            <input type="radio" name="trained" value="Unknown"<?php if($animal[0]['trained']=="Unknown"){echo ' checked="checked"';}?>> I don't know <br><br>
                                        </label>
                                    </div>
                                </div>

                                <label for="kids">Good with kids <br><br></label>
                                <div class="question_box">
                                    <div class="radioButton">
                                        <label for="yes">
                                            <input type="radio" name="kids" value="Yes"<?php if($animal[0]['kids']=="Yes"){echo ' checked="checked"';}?>>Yes <br>
                                        </label>
                                        <label for="no">
                                            <input type="radio" name="kids" value="No"<?php if($animal[0]['kids']=="No"){echo ' checked="checked"';}?>>No <br>
                                        </label>
                                        <label for="unknown">
                                            <input type="radio" name="kids" value="Unknown"<?php if($animal[0]['kids']=="Unknown"){echo ' checked="checked"';}?>>I don't know <br><br>
                                        </label>
                                    </div>
                                </div>
                                
                                <label for="purebred">Purebred <br><br></label>
                                <div class="question_box">
                                    <div class="radioButton">
                                        <label for="yes">
                                            <input type="radio" name="purebred" value="Yes"<?php if($animal[0]['purebred']=="Yes"){echo ' checked="checked"';}?>>Yes <br>
                                        </label>
                                        <label for="no">
                                            <input type="radio" name="purebred" value="No"<?php if($animal[0]['purebred']=="No"){echo ' checked="checked"';}?>>No <br>
                                        </label>
                                        <label for="unknown">
                                            <input type="radio" name="purebred" value="Unknown"<?php if($animal[0]['purebred']=="Unknown"){echo ' checked="checked"';}?>>I don't know <br><br>
                                        </label>
                                    </div>
                                </div>

                                <label for="special_needs">Special needs<br><br></label>
                                <div class="question_box">
                                    <input type="text" name="special_needs" value=<?=$animal[0]['specialNeeds']?>>
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
                                    <textarea maxlength="2000" name="story" id="pet_story" cols="30" rows="12"><?= $animal[0]['story'] ?></textarea>
                                    </div>
                                </div>

                                <div class = "next_page">
                                    <button type="submit" class="submit_button"> SAVE CHANGES </button>
                                    <input type="hidden" name="animalid" value="<?=$animals[0]?>">
                                </div>
                            </section>
                            
                            </ul>
                        </form>
                    
                </section>
            
        </body>
    </html>

<?php } ?>