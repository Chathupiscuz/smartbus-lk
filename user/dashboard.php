<?php
session_start();

if(!isset($_SESSION['user'])){
header("Location:../index.php");
}

include("../config/db.php");

$buses=mysqli_query($conn,"SELECT * FROM buses");
?>

<!DOCTYPE html>
<html>
<head>

<title>User Dashboard</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container"
style="width:90%;">

<h1>Bus Time Table</h1>
<div style="display:flex;gap:10px;margin-bottom:20px;">

<a href="../index.php">
<button style="
width:200px;
background:#555;
">
⬅ Back To Login
</button>
</a>

<a href="../logout.php">
<button style="
width:200px;
background:#c0392b;
">
Logout
</button>
</a>

</div>

<table width="100%" cellpadding="15">

<tr>
<th>Bus</th>
<th>Start</th>
<th>End</th>
<th>Time</th>
<th>Track</th>
</tr>

<?php while($row=mysqli_fetch_assoc($buses)){ ?>

<tr>

<td><?php echo $row['bus_name']; ?></td>

<td><?php echo $row['start_location']; ?></td>

<td><?php echo $row['end_location']; ?></td>

<td><?php echo $row['departure_time']; ?></td>

<td>

<a href="track_bus.php?id=<?php echo $row['id']; ?>">
<button>Track</button>
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>