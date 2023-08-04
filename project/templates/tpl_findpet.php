<?php function draw_findpet($animals, $totalanimals, $forward, $back, $page) { ?>
        <div class="container"></div>
            <div class="backgroundBox">
                <div class="findpetmessage">
                    <label>Filters</label>
                <div>
                <div class="filtersandcards">
                    <div class="filters">
                        <ul>
                            <form action="findpet.php?page=1" method="GET">
                                <p>Location</p>
                                <li><select name="location">
                                    <option value="" selected>Any</option>
                                    <option value="Aveiro">Aveiro</option>
                                    <option value="Beja">Beja</option>
                                    <option value="Braga">Braga</option>
                                    <option value="Bragança">Braganca</option>
                                    <option value="Castelobranco">Castelo Branco</option>
                                    <option value="Coimbra">Coimbra</option>
                                    <option value="Evora">Evora</option>
                                    <option value="Faro">Faro</option>
                                    <option value="Guarda">Guarda</option>
                                    <option value="Leiria">Leiria</option>
                                    <option value="Lisboa">Lisboa</option>
                                    <option value="Portalegre">Portalegre</option>
                                    <option value="Porto">Porto</option>
                                    <option value="Santarem">Santarem</option>
                                    <option value="Setubal">Setubal</option>
                                    <option value="Viana do Castelo">Viana do Castelo</option>
                                    <option value="Vila Real">Vila Real</option>
                                    <option value="Viseu">Viseu</option>
                                    <option value="Acores">Acores</option>
                                    <option value="Madeira">Madeira</option>
                                    </select>
                                </li>
                                <p>Breed</p>          
                                <li>
                                    <select name="breed">
                                        <option value="" selected>Any</option>
                                        <option value="Cat">---- Cats ----</option>
                                        <option value="Siamese">Siamese</option>
                                        <option value="Persian">Persian</option>
                                        <option value="Maine Coon">Maine Coon</option>
                                        <option value="Ragdoll">Ragdoll</option>
                                        <option value="Bengal">Bengall</option>
                                        <option value="Abyssinian">Abyssinian</option>
                                        <option value="Birman">Birman</option>
                                        <option value="Oriental Short Hair">Oriental Short Hair</option>
                                        <option value="Sphynx">Sphynx</option>
                                        <option value="Devon Rex">Devon Rex</option>
                                        <option value="Himalayan">Himalayan</option>
                                        <option value="American Short Hair">American Short Hair</option>
                                        <option value="Other">Other</option>
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
                                        <option value="Pitbull">Pitbull</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </li>
                                <p>Gender</p>
                                <li>
                                    <select name="gender">
                                    <option value="" selected>Any</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    </select>
                                </li>
                                <p>Age</p>
                                <li>
                                    <select name="age">
                                    <option value="">Any</option>
                                    <option value="baby">Puppy/Kitten</option>
                                    <option value="young">Young</option>
                                    <option value="adult">Adult</option>
                                    <option value="senior">Senior</option>
                                    </select>
                                </li>
                                <input type="hidden" id="hide" name="page" value="1">
                                <button type="submit" class="submit-searchpets">Search</button>
                            </form>
                        </ul>
                    </div>
                    <div class = "cardscontainer">
                        <div class = "cards">
                            <?php foreach ($animals as $animal) { 
                                $id = $animal['animal_id'];
                                $link = "animalsdetails.php?animal_id=".$id;
                                ?>
                                <a href=<?=$link?> style="text-decoration:none">
                                    <div class="card">
                                        <div class = "card_image-container">
                                            <img src= <?= $animal['title'] ?> alt="logo"/>
                                        </div>
                                        <div class="card_content">
                                            <p class="card_title text--medium">
                                                <p class="animal"><?=$animal['animal_name']?></p>
                                            </p>
                                        </div>
                                        <div class="card_info">
                                            <p class="text--medium">
                                                <p class="animal"><?=$animal['gender']?>, <?=$animal['age']?> years old</p>
                                            </p>
                                        </div>
                                        <div class="card_info2">
                                            <p class="card_price text--medium">
                                                <p class="animal"><?=$animal['location']?></p>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="backandforwardcontainer">
                    <div class="backandforward">
                        <?php if ($page != 1) { ?>
                            <div class="back">
                                <a href=<?=$back?>>
                                    <i class="material-icons" style="font-size:35px">keyboard_arrow_left</i>
                                </a>
                            </div>
                        <?php } ?>
                        <?php if (count($totalanimals) > ($page * 8)) { ?>
                            <div class="forward">
                                <a href=<?=$forward?>>   
                                    <i class="material-icons" style="font-size:35px">keyboard_arrow_right</i>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </body>
        
    </html>
<?php } ?>