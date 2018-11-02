<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style_list.css">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
</html>

<?php
$user = $_GET['usertype'];
include "config.php";
include "dashboard.html";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
  if($user == "patient"){
    $sql = "SELECT pid, name, gender, dob, phone FROM patient";
    $result = mysqli_query($conn,$sql);
    $c = 1;
    if ($result->num_rows >= 0) {
      echo "<head><h1 align=\"center\"> Patient details</h1><body align=\"center\"><div class=\"w3-container\"><table><tr><th>Si.</th><th>Patient id</th><th>Patient name</th><th>Gender</th><th>DOB</th><th>Phone No.</th><th>Delete patient</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>$c</td><td>" . $row["pid"]. "</td><td>" . $row["name"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["dob"]. "</td><td>" . $row["phone"]. "</td><td><form action=\"del_user.php\" method=\"post\"><input type=\"hidden\" name=\"val\" value=".$row["pid"]."><input type=\"hidden\" name=\"table\" value=\"patient\"><input type=\"hidden\" name=\"check\" value=\"delete\"><input type=\"submit\" class=\"w3-button w3-red\"value=\"Delete\"/></form></td></tr>";
        $c++;
    }
    echo "</table>";
    echo "</div></body></head>";
  }
}

if($user == "doctor"){
    $sql = "SELECT did, department, doctortype, specialization, firstname, lastname, gender, phone FROM doctor left join employee on doctor.did=employee.eid where status=1";
    $result = mysqli_query($conn,$sql);
    $c = 1;
    if ($result->num_rows >= 0) {
      echo "<head><h1 align=\"center\"> Doctor details</h1><body align=\"center\"><div class=\"w3-container\"><table><tr><th>Si.</th><th>Doctor id</th><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Department</th><th>Specialization</th><th>Type</th><th>Phone</th><th>Action</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>$c</td><td>" . $row["did"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["department"]. "</td><td>" . $row["specialization"]. "</td><td>" . $row["doctortype"]. "</td><td>" . $row["phone"]. "</td><td><form action=\"del_user.php\" method=\"post\"><input type=\"hidden\" name=\"val\" value=".$row["did"]."><input type=\"hidden\" name=\"table\" value=\"doctor\"><input type=\"hidden\" name=\"check\" value=\"delete\"><input type=\"submit\" class=\"w3-button w3-red\"value=\"Delete\"/></form></td></tr>";
        $c++;
    }
    echo "</table>";
    echo "</div></body></head>";
  }
  }

if($user == "nurse"){
    $sql = "SELECT nid, firstname, lastname, gender, phone, roomid FROM nurse left join employee on nurse.nid=employee.eid where status=1";
    $result = mysqli_query($conn,$sql);
    $c = 1;
    if ($result->num_rows >= 0) {
      echo "<head><h1 align=\"center\">Nurse details</h1><body align=\"center\"><div class=\"w3-container\"><table><tr><th>Si.</th><th>Nurse id</th><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Current room</th><th>Phone</th><th>Action</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>$c</td><td>" . $row["did"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["roomid"]. "</td><td>" . $row["phone"]. "</td><td><form action=\"del_user.php\" method=\"post\"><input type=\"hidden\" name=\"val\" value=".$row["nid"]."><input type=\"hidden\" name=\"table\" value=\"nurse\"><input type=\"hidden\" name=\"check\" value=\"delete\"><input type=\"submit\" class=\"w3-button w3-red\"value=\"Delete\"/></form></td></tr>";
        $c++;
    }
    echo "</table>";
    echo "</div></body></head>";
  }
 }

if($user == "receptionist"){
    $sql = "SELECT rid, firstname, lastname, gender, phone FROM nurse left join employee on receptionist.nid=employee.eid where status=1";
    $result = mysqli_query($conn,$sql);
    $c = 1;
    if ($result->num_rows >= 0) {
      echo "<head><h1 align=\"center\">Receptionist details</h1><body align=\"center\"><div class=\"w3-container\"><table><tr><th>Si.</th><th>Nurse id</th><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Phone</th><th>Action</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>$c</td><td>" . $row["did"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["phone"]. "</td><td><form action=\"del_user.php\" method=\"post\"><input type=\"hidden\" name=\"val\" value=".$row["rid"]."><input type=\"hidden\" name=\"table\" value=\"receptionist\"><input type=\"hidden\" name=\"check\" value=\"delete\"><input type=\"submit\" class=\"w3-button w3-red\"value=\"Delete\"/></form></td></tr>";
        $c++;
    }
    echo "</table>";
    echo "</div></body></head>";
  }
 }

mysqli_close($conn);
}
?>
