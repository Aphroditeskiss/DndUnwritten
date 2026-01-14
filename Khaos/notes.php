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
head("Notes")
?>
<body>
    <?php
    khaosHeader();
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    ?>
    <div class="addNote">
        <form method="post">
            <h2>Add a note</h2>
            <textarea name="addNote" id="addNote"></textarea><br>
            <input type="submit" name="submitNote" id="submitNote">
        </form>
    </div>
    <?php
    }
    ?>
</body>
</html>