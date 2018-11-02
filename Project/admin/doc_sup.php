<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style_list.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <p id="showAllLogin" ></p>
<?php
include "config.php";
include "dashboard.html";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
$sql = "SELECT did, firstname, lastname, department FROM doctor left join employee on doctor.did=employee.eid WHERE status=0";
$result = mysqli_query($conn,$sql);
$c = 1;
if ($result->num_rows >= 0) {
    echo "<head><h1 align=\"center\">Pending Doctor Signup Requests</h1><body align=\"center\"><div class=\"w3-container\"><table><tr><th>Si_No</th><th>Doctor_id</th><th>Firstname</th><th>Lastname</th><th>Department</th><th colspan=\"2\">Respond</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>$c</td><td>" . $row["did"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["department"]. "</td><td><form action=\"respond.php\" method=\"post\"><input type=\"hidden\" name=\"table\" value=\"doctor\"><input type=\"hidden\" name=\"val\" value=".$row["did"]."><input type=\"hidden\" name=\"check\" value=\"accept\"><input type=\"submit\" class=\"w3-button w3-green\"value=\"Accept\"/></form></td>
        <td><form action=\"respond.php\" method=\"post\"><input type=\"hidden\" name=\"val\" value=".$row["did"]."><input type=\"hidden\" name=\"table\" value=\"doctor\"><input type=\"hidden\" name=\"check\" value=\"decline\"><input type=\"submit\" class=\"w3-button w3-red\"value=\"Decline\"/></form></td></tr>";
        $c++;
    }
    echo "</table>";
    echo "</div></body></head>";
}
}
?>
