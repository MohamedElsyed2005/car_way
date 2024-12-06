<?php
require 'config.php';

if(isset($_POST["submit"])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_num = $_POST['phone_num'];
    $password = $_POST["password"];
    $address = $_POST["Address"];


    $duplicate = mysqli_query($conn,"SELECT * FROM customer WHERE Email = '$email'");

    if(mysqli_num_rows($duplicate) > 0){
       echo "<script> alert('Try another Email');</script>";
    }
    else{

        $query = "INSERT INTO customer VALUES('', '$first_name', '$last_name','$email', '$phone_num', '$password', '$address')";
        mysqli_query($conn, $query);
        echo "<script> alert('Registration Successful');</script>";
    }
    header("Location: login.html");
}
?>