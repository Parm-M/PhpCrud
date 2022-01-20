<?php
//MYSQL Connection
$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbDatabase = "crudcollegedb";

// connection
$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbDatabase);

// To check connection is working or not
if ($conn->connect_error) {
    die("Connection Failed to DB". $conn->connect_error);
} 
// else {
//     echo "Connection is successful";
// }

$conn->close();
?>