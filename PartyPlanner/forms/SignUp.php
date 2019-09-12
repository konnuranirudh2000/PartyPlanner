<?php
include_once "../includes/db.php";
$first_name = mysqli_real_escape_string($conn,$_POST['FirstName']);
$last_name = mysqli_real_escape_string($conn,$_POST['LastName']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$passwordC = mysqli_real_escape_string($conn,$_POST['passwordC']);
$password = hash("md5",$password);

if($passwordC!=$password){
    header("Location: ../Signup.php")
}


$query = "SELECT * FROM users WHERE email='$email';";
$r = mysqli_query($conn,$query);
if(mysqli_num_rows($r)>0) {
    header("Location:../Signup.php?error=exists");
    exit();
} else{
    $query = "INSERT INTO users(first_name,last_name,email,pasword) VALUES ('$first_name','$last_name','$email','$password');";
    mysqli_query($conn,$query);
    echo "Thank You Bitch!!";
}