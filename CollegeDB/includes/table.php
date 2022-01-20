<?php
  include("DB-inc.php");
  include_once("Header.php");
  $query = "SELECT * FROM `students`";
  $conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbDatabase);
  $result = mysqli_query($conn, $query);
  $records = mysqli_num_rows($result);
?>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="editModal">Delete Data</button>
<div class="modal" tabindex="-1">
  <div class="modal-dialog id="editModal" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Please be Sure Before Deleting Data.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<!-- Table Starts Here -->

<div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Course</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (!empty($records)) {
              while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $row['ID']; ?></th>
                    <td><?php echo $row['FIRST_NAME']. ' ' .$row['LAST_NAME']; ?></td>
                    <td><?php echo $row['GENDER']; ?></td>
                    <td><?php echo $row['EMAIL']; ?></td>
                    <td><?php echo $row['COURSE']; ?></td>
                    <td>
                      <a href="add.php?id=<?php echo $row['ID']; ?>" class="btn btn-primary">EDIT</a>
                      <a href="delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-secondary" onclick="javascript:return confirm('Do you really Want to Delete?');">DELETE</a>
                    </td>
                  </tr>


                <?php
              }
            }

          ?>
          
        </tbody>
      </table>
</div>
