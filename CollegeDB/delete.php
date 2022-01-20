<?php

require_once 'includes/DB-inc.php';
$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbDatabase);


if (!empty($_GET['ID'])) {
    # code...
    $ID = $_GET['ID'];
    $del_query = "DELETE FROM `students` WHERE ID = '".$ID."'";
    $result = mysqli_query($conn, $del_query);
    if ($result) {
        header('location:/collegeDB/index.php?msg=del');
        echo "Record Deleted Successfully";
    }
    else {
        echo "Error Deleting Record:" .mysqli_error($conn);
    }

}




