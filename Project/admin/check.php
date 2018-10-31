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
     $name = $_POST['admin_id'];
     $password = $_POST['admin_pass'];
     if(isset($name,$password)) 
     {     
        $sql = "SELECT adminid, password FROM adminlogin WHERE adminid = '$name' AND  password = '$password'";
        $result = mysqli_query($conn,$sql);
 
         if(mysqli_num_rows($result) > 0 )
         { 
            $_SESSION["logged_in"] = true; 
            $_SESSION["naam"] = $name;
             header('Location: dashboard.html');
            // echo "success";
        }
         else
         {
             echo 'The username or password are incorrect!';
         }
 }

}



?>