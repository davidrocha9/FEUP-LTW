<?php
  include_once('../database/db_user.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shelter Me</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" href= "../assets/logo.png">
    </head>

    <header>
        <div class="menu">
            <div class="logo">
                <a href="frontpage.php">
                    <img src="../assets/logo.png" alt="logo" width="100px"/>
                </a>
            </div>
            <nav>
                <ul>
                <li><a href="findpet.php?page=1&location=&breed=&gender=&age=">Find a Pet</a></li>
                <li><a href="rehomeapet.php">Rehome a Pet</a></li>
                <li><a href="whyadopt.php">Why Adopt?</a></li>
                <li><a href="petcare.php">Pet Care</a></li>
                <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </div>
        <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
            <div class="usernameLogout">
                <div class="username">
                    <?=$_SESSION['username']?>
                </div>
                <a href="../pages/notifications.php">
                    <div class="notifications">
                        <?php if (checkNewNotifications($_SESSION['username'])) { ?>
                            <div class="notificationsIcon">
                                <i class="material-icons" style="font-size:35px">notifications_active</i>
                            </div>
                        <?php } else { ?>
                            <div class="notificationsIcon">
                                <i class="material-icons" style="font-size:35px">notifications</i>
                            </div>
                        <?php } ?>
                    </div>
                </a>
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
    </header>

    <script>
        window.addEventListener('scroll', function() {
            let header = document.querySelector('header');
            let windowPosition = window.scrollY > 0;

            header.classList.toggle('scrolling-active', windowPosition);
        })
    </script>