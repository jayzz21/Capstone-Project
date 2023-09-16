<?php
include_once "D:/xampp/htdocs/Capstone/db/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Handle uploaded image
    if (isset($_FILES['userImage'])) {
        $image = $_FILES['userImage']['name'];
        $tmpImage = $_FILES['userImage']['tmp_name'];
        $imageDir = 'path/to/image/directory/'; // Change this to your image directory path
        $imagePath = $imageDir . $image;

        // Check if an image was uploaded
        if (!empty($image)) {
            // Move the uploaded image to the destination directory
            if (move_uploaded_file($tmpImage, $imagePath)) {
                // Image uploaded successfully
            } else {
                echo "Error uploading image.";
                exit;
            }
        } else {
            // No new image provided, keep the existing image path
            $imagePath = $_POST['existingImage'];
        }
    }

    $sql = "UPDATE users SET 
        Fname = '$fname',
        Lname = '$lname',
        email = '$email',
        username = '$username',
        password = '$password',
        role = '$role',
        Image = '$imagePath'
        WHERE ID = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "true";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>
