<?php function draw_login() { 
/**
 * Draws the login section.
 */ ?>
  <!DOCTYPE html>
  <html>
      <head>
          <title>Shelter Me</title>
          <link rel="stylesheet" href="../css/style.css">
      </head>
      <body>
          <div class="hero">
              <div class="form-boxlogin">
                  <div class="button-box">
                      <div id="loginbtn"></div>
                      <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                      <button type="button" class="toggle-btn" onclick="register()">Register</button>
                  </div>
                  <form method="post" action= "../actions/action_login.php" id="login" class="input-group">
                      <input type="text" name="username" class="input-field" placeholder="Username" required>
                      <input type="password" name="password" class="input-field" placeholder="Password" required>
                      <button type="submit" class="submit-btn">Log In</button>
                  </form>
                  <form method="post" action= "../actions/action_register.php" id="register" class="input-group">
                      <input type="text" name="username" class="input-field" placeholder="Username" required>
                      <input type="text" name="email" class="input-field" placeholder="Email" required>
                      <input type="password" name="password" class="input-field" placeholder="Password" required>
                      <input type="password" name="confirmpassword" class="input-field" placeholder="Confirm Password" required>
                      <button type="submit" class="submit-btn">Register</button>
                  </form>
              </div>
              <div id="loginbackground">
              </div>
              <div id="loginlogo">
                  <img src="../assets/logo.png" alt="loginlogo" width="200px">
              </div>
          </div>
          
          <section id="messages">
              <?php $errors = getErrorMessages();foreach ($errors as $error) { ?>
                  <article class="error">
                      <p><?=$error?></p>
                  </article>
              <?php } ?>
              <?php $successes = getSuccessMessages();foreach ($successes as $success) { ?>
                  <article class="success">
                      <p><?=$success?></p>
                  </article>
              <?php } clearMessages(); ?>
          </section>

          <script>
              var x = document.getElementById("login");
              var y = document.getElementById("register");
              var z = document.getElementById("loginbtn");

              function register(){
                  x.style.left = "-500px";
                  y.style.left = "150px";
                  z.style.left = "110px";
              }

              function login(){
                  x.style.left = "150px";
                  y.style.left = "650px";
                  z.style.left = "0px";
              }

          </script>
      </body>
  </html>
<?php } ?>