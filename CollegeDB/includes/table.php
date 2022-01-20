<?php
  include("DB-inc.php");
  include_once("Header.php");
  $query = "SELECT * FROM `students`";
  $conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbDatabase);
  $result = mysqli_query($conn, $query);
  $records = mysqli_num_rows($result);
?>

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
                      <a href="/collegeDB/add.php?id=<?php echo $row['ID']; ?>" class="btn btn-primary">EDIT</a>
                      <a href="/collegeDB/delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-secondary">DELETE</a>
                    </td>
                  </tr>


                <?php
              }
            }

          ?>
          
        </tbody>
      </table>
</div>