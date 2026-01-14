<?php

require('inc/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginSubmit'])) {
    verifyLogin();
} 
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    login();
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
head("Secret")
    ?>

<body>
    <?php
    khaosHeader();
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        ?>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis ipsum placeat, magni, beatae nulla, laudantium
        minima culpa odit quis labore modi facere quasi dicta quo fuga libero! Alias, autem vero?
        <?php
    }
    ?>
</body>

</html>