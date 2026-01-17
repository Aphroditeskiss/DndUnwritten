<?php
session_start();
require_once 'inc/classes.inc.php';
require_once 'inc/functions.php';

$test = $db->run("SELECT * FROM test")->fetch();
// print_r( $test);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        head("home");
        ?>
    </head>
    <body id="body">
        <?php
        im_headering_it_right_now();
        ?>
        
        <h1>im jorking my peanits right neow</h1>
        <p>Hi daphne........... Als je dit leest, ben ik dood....... En vind ik dat je 500 euro naar mijn huis moet stuuren, voor mijn begravenis.......</p>
        <br>
        <p>twig soon.... i hope</p>

        <img src="img/bow-shoot.gif">
        
        <p>Oh ja klick op de vogel :D</p>
        <video id="video" src="img/birb.mp4" autoplay muted loop></video>
        
        <?php
        footer();
        ?>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const video = document.getElementById('video')
            const body = document.getElementById('video')

            body.addEventListener('click', function() {
                if (video.muted == false) {
                    video.muted = true;
                } else {
                    video.muted = false;
                }
            });
        });
    </script>
</html>