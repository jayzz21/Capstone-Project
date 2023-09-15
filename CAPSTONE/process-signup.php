<?php
if (empty($_POST["Fname"])) {
    die("First name is required");
}
if (empty($_POST["Lname"])) {
    die("Last name is required");
}
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}
if (empty($_POST["username"])) {
    die("username is required");
}
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}
if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$mysqli = require __DIR__ . "db/database.php";
$sql = "INSERT INTO users (Fname, Lname, email, username, password, role)  
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param("ssssss",  
                  $_POST["Fname"],
                  $_POST["Lname"],
                  $_POST["email"],
                  $_POST["username"],
                  $_POST["password"],
                  $_POST["role"]);

if ($stmt->execute()) {
    header("Location: signup-success.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
