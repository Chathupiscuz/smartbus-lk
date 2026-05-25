<?php

include("config/db.php");

if(isset($_POST['register'])){

$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);

$sql="INSERT INTO users(username,email,password)
VALUES('$username','$email','$password')";

if(mysqli_query($conn,$sql)){

echo "<script>
alert('Registration Success');
window.location='index.php';
</script>";

}else{
echo "Error";
}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

<h1>Create Account</h1>

<form method="POST">

<input type="text"
name="username"
placeholder="Username"
required>

<input type="email"
name="email"
placeholder="Email"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button name="register">
Register
</button>

</form>

<div class="link">
<a href="index.php">
Back To Login
</a>
</div>

</div>

</body>
</html>