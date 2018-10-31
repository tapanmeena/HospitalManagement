<?php
$servername = "localhost";
$username = "prashanth";
$password = "123456";
$dbname = "cs387";

$check = $_POST['check'];
$val = $_POST['val'];
$table = $_POST['table'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else {
    //echo "Connected Succesfully<br>";
    $val1=(string)$val;
    $val2=(string)$val;
    if($check == "accept"){
      if($table == "doctor"){
      $sql1="update login set status=1 where userid=\"$val1\"";
      $result=mysqli_query($conn,$sql1);
      $sql="update doctor set status=1 where did=$val1";
      mysqli_query($conn,$sql);
      mysqli_close($conn);
      header("Refresh:0; url=doc_sup.php");
    }
    else if($table == "receptionist"){
    $sql1="update login set status=1 where userid=\"$val1\"";
    $result=mysqli_query($conn,$sql1);
    $sql="update receptionist set status=1 where rid=$val1";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("Refresh:0; url=recep_sup.php");
  }
  else if($table == "nurse"){
    $sql1="update login set status=1 where userid=\"$val1\"";
    $result=mysqli_query($conn,$sql1);
    $sql="update nurse set status=1 where nid=$val1";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("Refresh:0; url=nurse_sup.php");

  }
}
  else if($check == "decline"){
    if($table == "doctor"){
      $sql="delete from doctor where did=$val2";
      mysqli_query($conn,$sql);
      $sql1="delete from login where userid='$val2'";
      $result=mysqli_query($conn,$sql1);
      mysqli_close($conn);
      header("Refresh:0; url=doc_sup.php");
    }
    if($table == "receptionist"){
        $sql="delete from receptionist where rid=$val2";
        mysqli_query($conn,$sql);
        $sql1="delete from login where userid='$val2'";
        $result=mysqli_query($conn,$sql1);
        mysqli_close($conn);
        header("Refresh:0; url=recep_sup.php");
    }
    if($table == "nurse"){
      $sql="delete from nurse where nid=$val2";
      mysqli_query($conn,$sql);
      $sql1="delete from login where userid='$val2'";
      $result=mysqli_query($conn,$sql1);
      mysqli_close($conn);
      header("Refresh:0; url=nurse_sup.php");
    }
  }
}
?>
