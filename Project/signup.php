<?php
$servername = "localhost";
$username = "prashanth";
$password = "123456";
$dbname = "cs387";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else {
     $user_id = $_POST['eid'];
     $pass = $_POST['pass'];
    $sql = "insert into login values(0,'$user_id','$pass',0)";
    $result = mysqli_query($conn, $sql);
    echo $result;
}



?>