<?php

$host = "localhost";
$dbname = "capstone";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);  // Corrected syntax here

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
