<?php

include("../config/db.php");

if(isset($_POST['add'])){

$name=$_POST['name'];
$start=$_POST['start'];
$end=$_POST['end'];
$time=$_POST['time'];
$speed=$_POST['speed'];
$distance=$_POST['distance'];

$sql="INSERT INTO buses(
bus_name,
start_location,
end_location,
departure_time,
average_speed,
total_distance
)

VALUES(
'$name',
'$start',
'$end',
'$time',
'$speed',
'$distance'
)";

mysqli_query($conn,$sql);

header("Location:dashboard.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h1>Add Bus</h1>

<form method="POST">

<input type="text"
name="name"
placeholder="Bus Name"
required>

<input type="text"
name="start"
placeholder="Start Location"
required>

<input type="text"
name="end"
placeholder="End Location"
required>

<input type="time"
name="time"
required>

<input type="number"
name="speed"
placeholder="Average Speed"
required>

<input type="number"
name="distance"
placeholder="Total Distance"
required>

<button name="add">
Add Bus
</button>

</form>

</div>

</body>
</html>