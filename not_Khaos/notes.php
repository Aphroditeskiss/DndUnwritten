<?php

require('inc/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginSubmit'])) {
    verifyLogin();
}
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    login();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitNote'])) {
    submitNote();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitEditNote'])) {
    submitEditNote($_GET['noteId']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteNote'])) {
    deleteNote($_GET['noteId']);
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
        if (!isset($_GET['noteId'])) {
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
        displayNotes();
    }
    ?>
</body>

</html>