<?php

session_start();

require_once('offlineDatabase.php');

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function head($title)
{
    ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="style/main.css">
        <link rel="shortcut icon" href="images/Khaos.gif" type="image/x-icon">
    </head>
    <?php
}

function khaosHeader()
{
    ?>
    <header>
        <logo>
            <a href="index">Khaos!</a>
        </logo>
        <nav>
            <ul>
                <li><a href="inventory">Inventory</a></li>
                <li><a href="notes">Notes</a></li>
                <li><a href="spells">Spells</a></li>
                <li><a href="combat">Combat Features</a></li>
                <li><a href="unset">Log out</a></li>
            </ul>
        </nav>
    </header>
    <?php
}

function login()
{
    ?>
    <div class="overlay">
        <div id="notesLogin">
            <form method="post">
                <h2>Who goes there?</h2>
                <label for="notesPassword">Password</label>
                <input type="password" name="password" id="password"><br>
                <input type="submit" name="loginSubmit" id="loginSubmit">
            </form>
        </div>
    </div>
    <?php
}

function verifyLogin()
{
    $password = $_POST['password'];
    $conn = dbConnect();

    $sql = "SELECT * FROM noteslogin WHERE id =" . 1;
    $result = $conn->query($sql) or die($conn->error);
    $hash = $result->fetch_assoc();

    if (password_verify($password, $hash['password'])) {
        $_SESSION['loggedIn'] = True;
    } else {
        echo '<script>
            alert("WRONG");
            window.history.back();
            </script>';
    }
}

function submitNote()
{
    if (!isset($_POST['addNote']) || trim($_POST['addNote']) === '') {
        return;
    }

    $note = $_POST['addNote'];
    $conn = dbConnect();

    $stmt = $conn->prepare("INSERT INTO notes (note) VALUES (?)");
    $stmt->bind_param("s", $note);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    echo '<script>
            alert("Submitted!");
            window.location.href= "notes"
            </script>';
}

function getNotes()
{
    $conn = dbConnect();

    $sql = "SELECT * FROM notes";
    $result = $conn->query($sql) or die($conn->error);
    $notes = $result->fetch_all(MYSQLI_ASSOC);

    return $notes;
}

function getNote($noteId)
{
    $conn = dbConnect();

    $sql = "SELECT * FROM notes WHERE id =" . $noteId;
    $result = $conn->query($sql) or die($conn->error);
    $note = $result->fetch_assoc();

    return $note;
}

function displayNotes()
{
    if (!isset($_GET['noteId'])) {
        $notes = getNotes();
        foreach ($notes as $note) {
            ?>
            <a href="notes?noteId=<?php echo $note['id'] ?>">Note <?php echo $note['id'] ?></a>
            <p><?php echo $note['note'] ?></p>
            <?php
        }
    } else {
        $note = getNote($_GET['noteId']);
        ?>
        <a href="notes">Go back</a>
        <p><?php echo $note['note'] ?></p><br>
        <form method="post">
            <textarea name="editNote" id="editNote"><?php echo $note['note'] ?></textarea><br>
            <input type="submit" name="submitEditNote" id="submitEditNote">
            <input type="submit" name="deleteNote" id="deleteNote" value="Delete">
        </form>
        <?php
    }
}

function submitEditNote($noteId)
{
    $note = trim($_POST['editNote']);

    if ($noteId <= 0 || $note === '') {
        return;
    }

    $conn = dbConnect();

    $stmt = $conn->prepare("UPDATE notes SET note = ? WHERE id = ?");
    $stmt->bind_param("si", $note, $noteId);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: notes?noteId=" . $noteId);
    exit;
}

function deleteNote($noteId)
{
    $noteId = (int) $noteId;

    if ($noteId <= 0) {
        return;
    }

    $conn = dbConnect();

    $stmt = $conn->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->bind_param("i", $noteId);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    echo '<script>
            alert("Note Deleted!");
            window.location.href= "notes"
            </script>';
    exit;
}