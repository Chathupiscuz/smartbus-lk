<?php

include("../config/db.php");

$id=$_GET['id'];

$bus=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT * FROM buses WHERE id='$id'")
);

date_default_timezone_set("Asia/Colombo");

$current=time();

$departure=strtotime($bus['departure_time']);

$hours=($current-$departure)/3600;

$distance=$hours*$bus['average_speed'];

if($distance<0){
$distance=0;
}

if($distance>$bus['total_distance']){
$distance=$bus['total_distance'];
}

$percentage=($distance/$bus['total_distance'])*100;

?>

<!DOCTYPE html>
<html>

<head>

<title>Track Bus</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<style>

.map{
width:100%;
height:400px;
background:#fff;
border-radius:20px;
margin-top:20px;
position:relative;
overflow:hidden;
}

.bus{
width:50px;
height:50px;
background:#8D6A9F;
position:absolute;
top:45%;
left:<?php echo $percentage; ?>%;
border-radius:50%;
transition:1s;
}

</style>

</head>

<body>

<div class="container"
style="width:90%;">

<h1>
Bus <?php echo $bus['bus_name']; ?>
Tracking
</h1>

<h2>
Current Distance:
<?php echo round($distance); ?> KM
</h2>

<div class="map">

<div class="bus"></div>

</div>

</div>

</body>
</html>