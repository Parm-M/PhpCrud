<?php
    //Header
    include_once("./includes/Header.php");
    require_once 'includes/DB-inc.php';
    $conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbDatabase);

    //  Data Insert into DB
  // if (isset($_POST['Submit'])  && $_POST['Submit'] !='') {
  //   // Require the DB connection
  //   echo "<pre>";
  //   print_r($_POST);
  //   echo "</pre>";
  // }

    if (isset($_POST['Submit'])){ 
    $FIRST_NAME = (!empty($_POST['FIRST_NAME'])) ? $_POST['FIRST_NAME'] : '';
    $LAST_NAME = (!empty($_POST['LAST_NAME'])) ? $_POST['LAST_NAME'] : '';
    $GENDER = (!empty($_POST['GENDER'])) ? $_POST['GENDER']: '';
    $EMAIL = (!empty($_POST['EMAIL'])) ? $_POST['EMAIL']: '';
    $COURSE = (!empty($_POST['COURSE'])) ? $_POST['COURSE']: '';
    
    $sql = "INSERT INTO `students` (FIRST_NAME, LAST_NAME, GENDER, EMAIL, COURSE) VALUES('" .$FIRST_NAME. "', '".$LAST_NAME."', '".$GENDER."', '".$EMAIL."', '".$COURSE."')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Holy guacamole!</strong> You should check in on some of those fields below.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

  }
//   Now Editing the Value
if (isset($_GET['ID']) && $_GET['ID'] != '') {
        $stu_id = $_GET['ID'];
        $stu_query = "SELECT * FROM `students` WHERE id='".$stu_id."' ";
        $stu_res = mysqli_query($conn, $stu_query);
        $results = mysqli_fetch_row($stu_res);
        // To check the Data is printing or not(Use for Index)
        //echo "<pre>"; print_r($results);
        $FIRST_NAME = $result[1];
        $LAST_NAME = $result[2];
        $GENDER = $result[3];
        $EMAIL = $result[4];
        $COURSE = $result[5];

    }
    else {
      // If code unable to find id so it left the field blanks
      $FIRST_NAME = "";
        $LAST_NAME = "";
        $GENDER = "";
        $EMAIL = "";
        $COURSE = "";
    }
?>
<?php



?>
  <!-- Forms Start Here -->
 <div class="container m-4">
      <form action="" method="POST">
        <div class="mb-3">
          <label for="FIRST_NAME" class="form-label">First Name</label>
          <input type="text" class="form-control" placeholder="First Name" id="FIRST_NAME" name="FIRST_NAME" value="<?php echo $FIRST_NAME; ?>">
        </div>
        <div class="mb-3">
          <label for="LAST_NAME" class="form-label">Last Name</label>
          <input type="text" class="form-control" placeholder="Last Name" id="LAST_NAME" name="LAST_NAME" value="<?php echo $LAST_NAME; ?>">
        </div>
        <div class="mb-3">
          <label for="Gender" class="form-label">Gender</label>
          <select class="form-control" name="GENDER" id="gender">
            <option value="">Select Gender</option>
            <option value="Male" <?php if($GENDER == 'Male') {echo "Selected";} ?> >Male</option>
            <option value="Female" <?php if($GENDER == 'Female') {echo "Selected";} ?> >Female</option>
            <option value="Transgender" <?php if($GENDER == 'Transgender') {echo "Selected";} ?> >Transgender</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="EMAIL" class="form-label">Your Email</label>
          <input type="email" class="form-control" placeholder="Your Email" id="EMAIL" name="EMAIL" value="<?php echo $FIRST_NAME; ?>">
        </div>
        <div class="mb-3">
          <label for="COURSE" class="form-label">YOUR COURSE</label>
          <select class="form-control" name="COURSE" id="COURSE">
            <option value="">Select Course</option>
            <option value="B.A" <?php if($COURSE == 'B.A') {echo "Selected";} ?> >B.A</option>
            <option value="M.A" <?php if($COURSE == 'M.A') {echo "Selected";} ?> >M.A</option>
            <option value="B.tech" <?php if($COURSE == 'B.tech') {echo "Selected";} ?> >B.tech</option>
          </select>
        </div>
        <div class="form-group-row">
          <div class="mb-3">
            <input type="hidden" name="ID" value="<?php echo $stu_id; ?>">
            <input type="Submit" name="Submit" class="btn btn-primary" value="Submit">
          </div>
        </div>
      </form>
    </div>
   
    
    
</body>
</html>
