<?php
 $mysqli = require __DIR__ . "/db/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // You should perform validation and sanitization on the data here.
    $fname = mysqli_real_escape_string($mysqli, $fname);
    $lname = mysqli_real_escape_string($mysqli, $lname);
    $email = mysqli_real_escape_string($mysqli, $email);
    $username = mysqli_real_escape_string($mysqli, $username);
    $password = mysqli_real_escape_string($mysqli, $password);
    $role = mysqli_real_escape_string($mysqli, $role);
    // Insert the user into the database
    $sql = "INSERT INTO users (Fname, Lname, email, username, password, role)
            VALUES ('$fname', '$lname', '$email', '$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "User added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
