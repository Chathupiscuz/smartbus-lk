<?php
session_start();
include("../config/db.php");

if(isset($_POST['login'])){

$username=$_POST['username'];
$password=md5($_POST['password']);

$sql="SELECT * FROM users
WHERE username='$username'
AND password='$password'
AND role='admin'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

$_SESSION['admin']=$username;

header("Location:dashboard.php");

}else{

echo "<script>alert('Invalid Admin')</script>";

}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>
<link rel="stylesheet" href="../assets/css/style.css">

<div class="container">

<h1>Admin Login</h1>

<form method="POST">

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button name="login">
Login
</button>

</form>

</div>

</body>
</html>