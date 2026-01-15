<?php

function dbConnect()
{
    $serverName = "sql100.infinityfree.com";
    $userName = "if0_40910419";
    $password = "kCeawXXCpgXOqqA";
    $dbName = "if0_40910419_theunwritten";

    $conn = new mysqli($serverName, $userName, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}