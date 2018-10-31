<?php
$servername = "localhost";
$username = "prashanth";
$password = "123456";
$dbname = "cs387";

function showAllLogin($table,$conn){
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "userid: " . $row["userid"]. "<br>";
        }
    }
    else {
    echo "0 results";
    }
}

//echo "hello";
$q = $_REQUEST["q"];
echo $q;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else {
    //echo "Connected Succesfully<br>";
    if($q=='Login'){
        showAllLogin('login',$conn);
    }
    $sql="update login set status=1 where userid=$q";
    mysqli_query($conn,$sql);

    $sql="update doctor set status=1 where did=$q";
    mysqli_query($conn,$sql);

    //printTable("login",$conn);
    mysqli_close($conn);
    execute("Refresh:0; url=doc_sup.php");
}

?>
