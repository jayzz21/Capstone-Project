<div>
  <h2>User Items</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Image</th>
        <th class="text-center">First Name</th>
        <th class="text-center">Last Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Username</th>
        <th class="text-center">Role</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    include_once "D:/xampp/htdocs/Capstone/db/database.php";
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
    
        <tr>
          <td><?= $row["ID"] ?></td>
          <td><img src="data:image/jpeg;base64,<?= base64_encode($row['Image']) ?>" width="50" height="50" /></td>
          <td><?= $row["Fname"] ?></td>
          <td><?= $row["Lname"] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["username"] ?></td>
          <td><?= $row["role"] ?></td>
          <td><button class="btn btn-primary" style="height: 40px" onclick="userEditForm('<?= $row['ID'] ?>')">Edit</button></td>
          <td><button class="btn btn-danger" style="height: 40px" onclick="userDelete('<?= $row['ID'] ?>')">Delete</button></td>
        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height: 40px" data-toggle="modal" data-target="#myModal">
    Add User
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New User Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' onsubmit="addUsers()" method="POST">
            <div class="form-group">
              <label for="fname">First Name:</label>
              <input type="text" class="form-control" id="fname" required>
            </div>
            <div class="form-group">
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control" id="lname" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" required>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
            <label for="role">Role:</label>
            <select id="role" name="role" required>
            <option value="custodian">Custodian</option>
             <option value="supervisor">Supervisor</option>
             <option value="staff">Staff</option>
            <option value="bookkeeper">Bookkeeper</option>
</select><br><br>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height: 40px">Add User</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height: 40px">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
