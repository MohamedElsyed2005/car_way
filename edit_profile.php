<?php
session_start();
require 'config.php';

if (!empty($_SESSION["id"])) {
    header("Location: profile.php");
}
if (isset($_POST["submit"])) {
    $customer_id = $_SESSION["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $Email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $address = $_POST["Location"];
    $sql = "UPDATE customer SET 
            first_name = '$first_name',
            last_name = '$last_name',
            Email = '$Email',
            phone = '$phone',
            password = '$password', 
            address = '$address'
            WHERE customer_id = '$customer_id'";
   
    if ($conn->query($sql) === TRUE) {
    header("Location: profile.php");
    exit();
    } else {
    echo "Error updating record: " . $conn->error;
    }
}
?>