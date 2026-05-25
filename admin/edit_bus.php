<?php

include("../config/db.php");

$id=$_GET['id'];

$bus=mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM buses WHERE id='$id'")
);

if(isset($_POST['update'])){

$name=$_POST['name'];
$start=$_POST['start'];
$end=$_POST['end'];
$time=$_POST['time'];

mysqli_query($conn,"UPDATE buses SET
bus_name='$name',
start_location='$start',
end_location='$end',
departure_time='$time'
WHERE id='$id'");

header("Location:dashboard.php");

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Bus</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h1>Edit Bus</h1>

<form method="POST">

<input type="text"
name="name"
value="<?php echo $bus['bus_name']; ?>"
required>

<input type="text"
name="start"
value="<?php echo $bus['start_location']; ?>"
required>

<input type="text"
name="end"
value="<?php echo $bus['end_location']; ?>"
required>

<input type="time"
name="time"
value="<?php echo $bus['departure_time']; ?>"
required>

<button name="update">
Save Changes
</button>

</form>

<br>

<a href="dashboard.php">
<button style="background:#555;">
⬅ Back
</button>
</a>

</div>

</body>
</html>