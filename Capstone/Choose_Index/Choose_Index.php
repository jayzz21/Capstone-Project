<!DOCTYPE html>
<html>
<head>
    <title>Pick your Role</title>
</head>
<body>
    <h1>Choose Your Role</h1>
    <link rel="stylesheet" href="choose_design.css">
    <form action="Roles.php" method="post">
        <label for="role">Select your role:</label>
        <select name="role" id="role">
            <option value="custodian_supervisor">Custodian Supervisor</option>
            <option value="bookkeeper">Bookkeeper</option>
            <option value="staff">Staff</option>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
