<?php

session_start();

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function dbConnect()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "unwritten";

    $conn = new mysqli($serverName, $userName, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function head($title)
{
    ?>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="style/main.css">
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
        $_SESSION['is_allowed'] = True;
    } else {
        echo '<script>
            alert("WRONG");
            window.history.back();
            </script>';
    }
}