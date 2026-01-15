<?php
session_start();
require_once 'inc/classes.inc.php';
$test = $db->run("SELECT * FROM test")->fetch();
print_r( $test);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kyreth - Home</title>
        <!-- <link rel="stylesheet" href="css/index.css"> -->
    </head>
    <body>
        
        <!-- <img src="img/kyreth.png">
        <p>Kyreth</p>
        <footer>
            <img src="img/kyreth-pet.gif">
        </footer> -->
    </body>
</html>