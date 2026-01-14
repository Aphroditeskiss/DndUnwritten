<?php 

require('inc/functions.php');
$_SESSION['is_allowed'] = True;
if ($_SESSION['is_allowed'] != True) {
    header("location: index");
    }

?>

<!DOCTYPE html>
<html lang="en">
<?php
head("Notes")
?>
<body>
    <?php
    khaosHeader();
    ?>
</body>
</html>