<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'role' field exists in the POST data
    if (isset($_POST['role'])) {
        $selectedRole = $_POST['role'];
        switch ($selectedRole) {
            case 'custodian_supervisor':
                header('Location: Costodian_Login.php');
                break;
            case 'bookkeeper':
                header('Location: bookkeeper.php');
                break;
            case 'staff':
                header('Location: staff.php');
                break;
                case 'supervisor':
                    header('Location: staff.php');
                    break;
            default:
                // Redirect back to the main page if an invalid option is selected
                header('Location: index.php');
                break;
        }
        exit; // Stop further execution after redirection
    }
}
// If the 'role' field is not present or the request method is not POST, redirect back to the main page
header('Location: index.php');