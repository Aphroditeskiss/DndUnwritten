<?php

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