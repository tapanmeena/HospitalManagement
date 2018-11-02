<!DOCTYPE html>
<?php
	include 'config.php';
?>
<html lang="en">
	<head>
		<title>Admin | Appointment History</title>
    <link rel="stylesheet" href="style_list.css">
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta names="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/plugins.css">
		<link rel="stylesheet" href="css/themes/theme-1.css" id="skin_color" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>

<div class="main-content" >
  <div class="wrap-content container" id="container">
    <section id="page-title">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="mainTitle">Patients  | Appointment History</h1>
        </div>
              </div>
    </section>
    </div>
    <div>
      <div class="container-fluid container-fullw bg-white">
          <div class="row">
          <div class="col-md-12">
            <table class="table table-hover" id="sample-table-1">
              <thead>
                <tr>
                  <th class="center">#</th>
                  <th class="hidden-xs">Doctor Name</th>
                  <th>Patient Name</th>
                  <th>Specialization</th>
                  <th>Consultancy Fee</th>
                  <th>Appointment Date / Time </th>
                  <th>Appointment Creation Date  </th>
                  <th>Current Status</th>
                  <th>Action</th>
              </thead>
						</tr>
              <tbody>
                <!-- $sql=mysql_query("select doctors.doctorName as docname,users.fullName as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join users on users.id=appointment.userId "); -->
<?php
$sql1="select pid,did,visitingdate,visitingtime,status from appointment where status=0"; //2 is for appointment is done(completed)
$result1 = mysqli_query($conn,$sql1);
if ($result1->num_rows >= 0) {
	$cnt=1;
	while($row = $result->fetch_assoc()){
		$doctorid=$row['did'];
		$sql2 = "select firstname,lastname from employee where eid=$doctorid";
		$result2 = mysqli_query($conn,$sql2);
		$sql3 = "select specialization from doctor where did=$doctorid";
		$result3 = mysqli_query($conn,$sql3);
		$patientid = $row['pid'];
		$sql4 = "select name from patient where pid=$patientid";
		$result4 = mysqli_query($conn,$sql4);
	}
}
?>


              </tbody>
            </table>
          </div>
        </div>
          </div>

	</body>
</html>
