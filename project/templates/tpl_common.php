<?php function draw_header() { 
    include_once('../includes/session.php');
/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in in order to draw the logout
 * link.
 */?>

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
<?php } ?>

<?php function draw_footer() { 
/**
 * Draws the footer for all pages.
 */ ?>
  </body>
</html>
<?php } ?>