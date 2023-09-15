<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Homepage</title>
</head>
<body>
    <header2>
        <div class="SystemName">
            <h5>SpendSphere</h5>
            <p5>Petty Cash Management System</p5>
        </div>
        <nav1>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav1>
    </header2>
    <section class="main-content">
        <div class="welcome-text">
            Welcome to Petty Cash Management System
        </div>
        <button id="getStartedButton">Get Started</button>

    <script>
        // Get a reference to the button
        const getStartedButton = document.getElementById("getStartedButton");

        // Add a click event listener to the button
        getStartedButton.addEventListener("click", function() {
            // Redirect to login.php
            window.location.href = "login.php";
        });
    </script>
    </section>
</body>
</html>
