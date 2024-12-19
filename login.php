<?php
  session_start();
  require 'config.php';

if(!empty($_SESSION["id"])){
    header("Location: User.php");
   }
   if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE Email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
           $_SESSION["login"] = true;
           $_SESSION["id"] = $row["customer_id"];
           header("Location: User.php");
        }
        else{
            echo
            "<script> alert('wrong password');</script>";
            header("Location: login.html");
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
   }
?>