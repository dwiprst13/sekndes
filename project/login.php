<?php
require 'config.php';
if(!empty($_SESSION["id"])){
header("Location: index.php");
}
if(isset($_POST["submit"])){
$email = $_POST["email"];
$password = $_POST["password"];
$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $row["user_id"];
    header("Location: index.php");
    }
    else{
    echo
    "<script> alert('Wrong Password'); </script>";
    }
}
else{
    echo
    "<script> alert('User Not Registered'); </script>";
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="src/css/login.css">
</head>
<body>
    <div class="login-container">
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
        <div class="txt_field">
        <input type="text" name="email" id = "email" required value=""> <br>
        <span></span>
        <label for="email">Email</label>
        </div>
        <div class="txt_field">
        <input type="password" name="password" id = "password" required value=""><br>
        <span></span>
        <label for="pass">Password</label>          
        </div>
        <button type="submit" name="submit">Login</button>
        <div class="signup_link">
        Belum punya akun? <a href="/login/registration.php">Daftar</a>
        </div>
    </form>
    
    </div>
</body>
</html>
