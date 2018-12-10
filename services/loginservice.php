<?php

include "./../lib/DBConnection.php";

$DBConnection = new DBConnection();
$DBConnection->connect();
$tbl_name="users";

// username and password sent from form
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($DBConnection, $username);
$password = mysqli_real_escape_string($DBConnection, $password);
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";

$result=mysqli_query($DBConnection, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if($count==1){
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    echo "<script>console.log($username)</script>";
}
echo "<script>console.log('Hello')</script>"
?>