<?php 

require('inc/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        verifyNotesLogin();
} 
if (!isset($_SESSION['is_allowed']) || $_SESSION['is_allowed'] !== true) {
    notesLogin();
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