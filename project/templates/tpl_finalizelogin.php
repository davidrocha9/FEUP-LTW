<?php function draw_finalizelogin() { ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Shelter Me</title>
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <div class="formwrapper">
                <div class="title">
                    Tell Us More About You!
                </div>
                <div class="formloginedit">
                    <form method="post" action= "../database/upload.php" name="register" enctype="multipart/form-data">
                        <div class="inputfield">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="input">
                        </div>  
                        <div class="inputfield">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="input">
                        </div>   
                        <div class="inputfield">
                            <label>Gender</label>
                            <div class="custom_select">
                                <select name="gender">
                                <option value="">Other</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                </select>
                            </div>
                        </div> 
                    <div class="inputfield" name="phonenumber">
                        <label>Phone Number</label>
                        <input type="text" name="phonenumber" class="input">
                    </div> 
                    <div class="inputfield">
                        <label>Description</label>
                        <textarea class="textarea" name="aboutme"></textarea>
                    </div>
                    <div class="inputfield">
                            <label>Location</label>
                        <div class="custom_select">
                            <select name="city">
                                <option value="">Other</option>
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
                        </div>
                    </div>
                    <div class="camera">
                        <i class="material-icons" style="font-size:35px">camera_alt</i>
                        <input type="file" name="image">
                    </div> 
                    <div class="inputfield">
                        <input type="submit" value="Register" class="btn">
                    </div>
                    </form>     
                </div>
            </div>
        </body>
    </html>
<?php } ?>