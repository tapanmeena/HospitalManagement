<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style_list.css">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
</html>

<?php
include "config.php";
include "dashboard.html";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $sql = "SELECT pid, doctorid, visitingdate, disease, prescribedmedication FROM history where status=10";
    $result = mysqli_query($conn,$sql);
    $c = 1;
    if ($result->num_rows >= 0) {
      echo "<head><h1 align=\"center\"> Patient History</h1><body align=\"center\"><div class=\"w3-container\"><table><tr><th>Si.</th><th>Patient id</th><th>Doctor id</th><th>Visitind date</th><th>Diagnosed</th><th>Medication</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>$c</td><td>" . $row["pid"]. "</td><td>" . $row["doctorid"]. "</td><td>" . $row["visitingdate"]. "</td><td>" . $row["disease"]. "</td><td>" . $row["prescribedmedication"]. "</td></tr>";
        $c++;
    }
    echo "</table>";
    echo "</div></body></head>";
  }
}

mysqli_close($conn);
?>
