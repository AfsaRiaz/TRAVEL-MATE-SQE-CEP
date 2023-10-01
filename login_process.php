<?php
session_start();
include 'conn.php';

$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);

$q = " select * from users where email = '$email' && password = '$password'";
$res = mysqli_query($conn,$q);
$num = mysqli_num_rows($res);
if($num == 1){
    $_SESSION['login'] = "1";
    $_SESSION['email'] = $email;
    
    header('location:account.php');
}
else{
    header('location:login.php');
}
?> 