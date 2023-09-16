    <?php

    $is_invalid = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $mysqli = require __DIR__ . "/db/database.php";
        
        $input = $_POST["username_email"];
        $password = $_POST["password"];
        
        // Check if the input contains "@" to determine if it's an email or username
        if (strpos($input, "@") !== false) {
            $sql = sprintf("SELECT * FROM users
                            WHERE email = '%s'",
                        $mysqli->real_escape_string($input));
        } else {
            $sql = sprintf("SELECT * FROM users
                            WHERE username = '%s'",
                        $mysqli->real_escape_string($input));
        }
        
        $result = $mysqli->query($sql);
        
        $users = $result->fetch_assoc();
        
        if ($users && $password === $users["password"]) {  
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $users["userID"];  

            // Determine which page to redirect based on the user's role
            $redirectPage = "";
            switch ($users["role"]) {
                case "Custodian":
                    $redirectPage = "Costudian-dash/costudian_index.php";
                    break;
                case "Bookkeeper":
                    $redirectPage = "book_index.php";
                    break;
                case "Staff":
                    $redirectPage = "staff_index.php";
                    break;
                case "Supervisor":
                    $redirectPage = "supervisor_index.php";
                    break;
                default:
                    // Redirect to a default page if role doesn't match any above
                    $redirectPage = "index.php";
            }

            header("Location: $redirectPage");
            exit;
        }
        
        $is_invalid = true;
    }

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <h1>Login</h1>
        
        <?php if ($is_invalid): ?>
            <em>Invalid login</em>
        <?php endif; ?>
        
        <form method="post">
            <label for="username_email">Username or Email</label>
            <input type="text" name="username_email" id="username_email"
                value="<?= htmlspecialchars($_POST["username_email"] ?? "") ?>">
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            
            <button>Log in</button>
        </form>
        
    </body>
    </html>
