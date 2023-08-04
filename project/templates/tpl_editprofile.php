<?php function draw_editprofile($user, $path) { ?>
    <!DOCTYPE html>
    <html>
        <body>
            <script>
                function toggleForms(pressedbtn){
                    var psdiv = document.getElementById("personalform");
                    var sdiv = document.getElementById("securityform");
                    switch(pressedbtn){
                        case "personal":
                                sdiv.style.display = "none";
                                psdiv.classList.remove('animated');
                                void psdiv.offsetWidth;
                                psdiv.classList.add('animated');
                                psdiv.style.display = "block";
                            break;
                        case "security":
                                psdiv.style.display = "none";
                                sdiv.classList.remove('animated');
                                void sdiv.offsetWidth;
                                sdiv.classList.add('animated');                  
                                sdiv.style.display = "block";
                            break;
                    }
                }
            </script>
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
                        <div class = "profileChanges">
                            <button onclick="toggleForms('personal')" class="editbuttons">Personal Changes</button>
                        </div>
                        <div class = "profileChanges">
                            <button onclick="toggleForms('security')" class="editbuttons">Security Changes</button>
                        </div>
                        <div class = "emptyspace"> </div>
                    </div>
                    
                    <div class="formwrapper">
                        <div class="title">
                            Tell Us More About You!
                        </div>
                        <div id="personalform" class="formloginedit">
                            <form method="post" action= "../actions/action_edituser.php" name="edit" class="input-group">
                                <input type="hidden" name = "token" value = "<?=$_SESSION['csrf']?>">
                                <div class="inputfield">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" class="input" value=<?=$user[0]['firstname']?>>
                                </div>  
                                <div class="inputfield">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="input" value=<?=$user[0]['lastname']?>>
                                </div>   
                                <div class="inputfield">
                                    <label>Gender</label>
                                    <div class="custom_select" name="custom_select">
                                        <select name="gender">
                                            <option value="" <?php if($user[0]['gender']=="other"){echo ' selected="selected"';}?> >Other</option>
                                            <option value="male" <?php if($user[0]['gender']=="male"){echo ' selected="selected"';}?>>Male</option>
                                            <option value="female" <?php if($user[0]['gender']=="female"){echo ' selected="selected"';}?>>Female</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="inputfield" name="phonenumber">
                                    <label>Phone Number</label>
                                    <input type="text" name="phonenumber" class="input" value=<?=$user[0]['phonenumber']?>>
                                </div> 
                                <div class="inputfield">
                                    <label>Description</label>
                                    <textarea class="textarea" name="aboutme" ><?=$user[0]['aboutme']?></textarea>
                                </div> 
                                <div class="inputfield">
                                    <label>Location</label>
                                    <input type="text" class="input" name="city" value=<?=$user[0]['city']?>>
                                </div> 
                                <div class="inputfield">
                                    <input type="submit" value="Confirm Changes" class="btn">
                                </div>
                            </form>    
                        </div>
                        <div id="securityform" class="formloginedit" style="display: none;">
                            <form method="post" action= "../actions/action_editsecuser.php" name="edit" class="input-group">
                                <input type="hidden" name = "token" value = "<?=$_SESSION['csrf']?>">
                                <div class="inputfield">
                                    <label>Username</label>
                                    <input type="text" name="username" class="input" value=<?=$user[0]['username']?>>
                                </div>
                                <div class="inputfield">
                                    <label>Old Password</label>
                                    <input type="password" name="oldpass" class="input">
                                </div>   
                                <div class="inputfield" name="phonenumber">
                                    <label> New Password</label>
                                    <input type="password" name="newpass" class="input">
                                </div> 
                                <div class="inputfield">
                                    <label>Confirm New Password</label>
                                    <input type="password" class="input" name="confirmnewpass">
                                </div> 
                                <div class="inputfield">
                                    <input type="submit" value="Confirm Changes" class="btn">
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>