
<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "capstone";

$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>