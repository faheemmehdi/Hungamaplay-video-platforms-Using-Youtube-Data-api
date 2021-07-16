<?php
// ------------Login-----------
session_start(); 

$error = ''; 

if (isset($_POST['login_submit'])) {





// Define $username and $password

$username = $_POST['username'];

$password = $_POST['password'];

$salt =  "portfolio";

$password_encrypted = sha1($password.$salt);

$query = "SELECT username, password from login where username=? AND password=? LIMIT 1";

include('config.php'); 

$stmt = $conn->prepare($query);

$stmt->bind_param("ss", $username, $password_encrypted);

$stmt->execute();

$stmt->bind_result($username, $password_encrypted);

$stmt->store_result();


if($stmt->fetch()){ 

$_SESSION['login_user'] = $username;
$_SESSION['status']="Login Successfully";
$_SESSION['icon']="success";

header("location:home.php"); 

}else{
$_SESSION['status']="Wrong username or password";
$_SESSION['icon']="error";
  // $error="Wrong username or password.";

  // echo "<script type='text/javascript'>alert('$error');</script>";

}

mysqli_close($conn); // Closing Connection

}


// -------------------------Login-End------------------------
?>