<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location:login.php");
}

include("../config/db.php");

$buses=mysqli_query($conn,"SELECT * FROM buses");
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container" style="width:95%;">

<h1>Admin Dashboard</h1>

<div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;">

<a href="add_bus.php">
<button style="width:200px;">
+ Add New Bus
</button>
</a>

<a href="../index.php">
<button style="width:200px;background:#555;">
⬅ Back To Login
</button>
</a>

<a href="../logout.php">
<button style="width:200px;background:#c0392b;">
Logout
</button>
</a>

</div>

<table width="100%" cellpadding="15">

<tr>

<th>ID</th>
<th>Bus</th>
<th>Start</th>
<th>End</th>
<th>Time</th>
<th>Actions</th>

</tr>

<?php while($row=mysqli_fetch_assoc($buses)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['bus_name']; ?></td>

<td><?php echo $row['start_location']; ?></td>

<td><?php echo $row['end_location']; ?></td>

<td><?php echo $row['departure_time']; ?></td>

<td style="display:flex;gap:10px;justify-content:center;">

<a href="edit_bus.php?id=<?php echo $row['id']; ?>">
<button style="background:#2980b9;width:100px;">
Edit
</button>
</a>

<a href="delete_bus.php?id=<?php echo $row['id']; ?>">
<button style="background:#c0392b;width:100px;">
Delete
</button>
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>