<?php 

require('inc/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        verifyLogin();
} 
if (!isset($_SESSION['is_allowed']) || $_SESSION['is_allowed'] !== true) {
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
    ?>
</body>
</html>