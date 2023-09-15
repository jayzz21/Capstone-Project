<div>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
  <h2>Add User</h2>
  <form action="add_user.php" method="post">

   <label for="SchoolID">School ID:</label>
    <input type="text" id="SchoolID" name="SchoolID" required><br><br>

    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname" required><br><br>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="role">Role:</label>
<select id="role" name="role" required>
  <option value="custodian">Custodian</option>
  <option value="supervisor">Supervisor</option>
  <option value="staff">Staff</option>
  <option value="bookkeeper">Bookkeeper</option>
</select><br><br>

    <input type="submit" value="Add User">
    
  </form>
</div>
