<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "car_way"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!empty($_SESSION["id"])){
    header("Location: welcome.html");
   }
   if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
           $_SESSION["login"] = true;
           $_SESSION["id"] = $row["id"];
           header("Location: welcome.html");
        }
        else{
            echo
            "<script> alert('wrong password');</script>";
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
   }
?>