<?php
session_start();
include("config/db.php");

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users 
            WHERE username='$username' 
            AND password='$password'
            AND role='user'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $_SESSION['user']=$username;

        header("Location:user/dashboard.php");

    }else{
        echo "<script>alert('Invalid User Login')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>SmartBus LK</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<div class="container">

<h1>User Login</h1>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

<div class="link">
<a href="register.php">Register New Account</a>
</div>

<br>

<div class="link">
<a href="admin/login.php">
<button>Admin Login</button>
</a>
</div>

</div>

</body>
</html>